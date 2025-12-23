<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Bank;
use App\Models\Withdraw;
use App\Models\Payout;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Log;
use Redirect;
use Hash;

class WithdrawRequest extends Controller
{
    public function index(Request $request)
    {
      $user=Auth::user();


          $limit = $request->limit ? $request->limit : 10;
            $status = $request->status ? $request->status : null;
            $search = $request->search ? $request->search : null;
            $notes = Payout::where('user_id',$user->id);
            
           if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){         
              $q->Where('ttime', 'LIKE', '%' . $search . '%')
              ->orWhere('user_id_fk', 'LIKE', '%' . $search . '%')
              ->orWhere('performance_bonus', 'LIKE', '%' . $search . '%')
              ->orWhere('level_bonus', 'LIKE', '%' . $search . '%');
            });
        
      }

            $notes = $notes->paginate($limit)
                ->appends([
                    'limit' => $limit
                ]);
        $this->data['withdraw_report'] =$notes;
        $this->data['page'] = 'user.withdraw.WithdrawRequest';
        return $this->dashboard_layout();
    }

 public function WithdrawRequest(Request $request)
{
    try {
        // Validation
        $validation = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:10', // You had 'min:' with no value — corrected to min:1
            'transaction_password' => 'required',
            //   'usdtBep20' => 'required',
            
            // 'paymentMode' => 'required', // Uncomment if needed
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = Auth::user();
        $password = $request->transaction_password;
        $balance = $user->available_balance();

        if ($balance < $request->amount) {
            return redirect()->back()->withErrors(['Insufficient balance in your account'])->withInput();
        }

        // Check for today's withdraw
        $todayWithdraw = Withdraw::where('user_id', $user->id)
            ->where('status', '!=', 'Failed')
            ->where('wdate', date('Y-m-d'))
            ->first();


   $account = Bank::where('user_id', $user->id)->value('account_no');

if (empty($account)) {
    return redirect()->back()
        ->withErrors(['Update your bank KYC']);
}


        $pendingWithdraw = Withdraw::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->first();

        if (!empty($pendingWithdraw)) {
            return redirect()->back()->withErrors(['Withdraw Request Already Exists!']);
        }

        // Transaction password check
        if (!Hash::check($password, $user->tpassword)) {
            return redirect()->back()->withErrors(['Invalid Transaction Password']);
        }

        // Insert withdraw request
        $data = [
            'txn_id' => md5(uniqid(rand(), true)),
            'user_id' => $user->id,
            'user_id_fk' => $user->username,
            'amount' => $request->amount,
            'account' => $account, // Fix: was undefined
            'payment_mode' => 'USDT', // Optional if required
            'status' => 'Pending',
            'wdate' => now()->format('Y-m-d'),
            
        ];

        $payment = Withdraw::create($data);
        $withdraw_id = $payment->id;

        $notify[] = ['success', 'Withdraw Request Submitted Successfully'];

        return redirect()->back()->with('withdrawalId', $withdraw_id)->withNotify($notify);

    } catch (\Exception $e) {
        Log::error('Withdraw Request Error: ' . $e->getMessage());
        return redirect()->route('user.WithdrawRequest')->withErrors(['error' => $e->getMessage()])->withInput();
    }
}


    public function WithdrawHistory(Request $request){

        $user=Auth::user();
        $limit = $request->limit ? $request->limit : paginationLimit();
         $status = $request->status ? $request->status : null;
         $search = $request->search ? $request->search : null;
         $notes = Withdraw::where('user_id',$user->id);
        if($search <> null && $request->reset!="Reset"){
         $notes = $notes->where(function($q) use($search){
            $q->Where('wdate', 'LIKE', '%' . $search . '%')
              ->orWhere('amount', 'LIKE', '%' . $search . '%')
              ->orWhere('status', 'LIKE', '%' . $search . '%')
              ->orWhere('txn_id', 'LIKE', '%' . $search . '%');
         });

        }

         $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

       $this->data['search'] =$search;
       $this->data['withdraw_report'] =$notes;
       $this->data['page'] = 'user.withdraw.WithdrawHistory';
       return $this->dashboard_layout();
    }
}
