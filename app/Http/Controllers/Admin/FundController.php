<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuyFund;
use App\Models\User;
use App\Models\Fundtransfer;
use App\Models\Debitfund;
use Hexters\CoinPayment\CoinPayment;
use App\Models\CoinpaymentTransaction;
use Illuminate\Support\Facades\Crypt;
use Redirect;
use Validator;
use Log;
class FundController extends Controller
{
    public function add_fund_report(Request $request)
    {


        $limit = $request->limit ? $request->limit :  paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = BuyFund::where('status','Pending')->orderBy('id', 'DESC');
        if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
               $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
            ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')
            ->orWhere('type', 'LIKE', '%' . $search . '%')
            ->orWhere('amount', 'LIKE', '%' . $search . '%');
            });

      }

      $notes = $notes->paginate($limit)
      ->appends([
          'limit' => $limit
      ]);

                $this->data['add_fund_report'] =  $notes;
                $this->data['search'] = $search;
                $this->data['page'] = 'admin.fund.add-fund-list';
                return $this->admin_dashboard();
    }



    


    public function transfer_fund()
    {
     
     $this->data['page'] = 'admin.fund.transfer-fund';
     return $this->admin_dashboard();

    }


    public function debit_fund()
    {
     
     $this->data['page'] = 'admin.fund.debit-fund';
     return $this->admin_dashboard();

    }



    public function SubmitFundTransfer(Request $request)
{

  try{
        $validation =  Validator::make($request->all(), [
               'amount' => 'required|numeric|min:0',
               'user_id' => 'required|exists:users,username',
          
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());

            return redirect()->route('admin.transfer-fund')->withErrors($validation->getMessageBag()->first())->withInput();
        }


        $userDetail = User::where('username',$request->user_id)->first();
        
        if($userDetail)
        {
            $data = [
                'user_id' => $userDetail->id,
                'user_id_fk' => $userDetail->username,
                'amount' => $request->amount,
                'credit_type' =>1,
                'status' => 'Approved',
                'bdate' => Date("Y-m-d"),
            ];
           $payment =  \DB::table('debitfunds')->insert($data);
          $notify[] = ['success', 'Fund Transfer  successfully'];
          return redirect()->back()->withNotify($notify);   
        }
        else
        {
          return Redirect::back()->withErrors(array('Invalid User ID'));  
        }

             
      }
       catch(\Exception $e){
        Log::info('error here');
        Log::info($e->getMessage());
        print_r($e->getMessage());
        die("hi");
        return  redirect()->route('admin.transfer-fund')->withErrors('error', $e->getMessage())->withInput();
    }

}




public function debitFund(Request $request)
{

  try{
        $validation =  Validator::make($request->all(), [
               'amount' => 'required|numeric|min:0',
               'user_id' => 'required|exists:users,username',
          
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());

            return redirect()->route('admin.transfer-fund')->withErrors($validation->getMessageBag()->first())->withInput();
        }


        $userDetail = User::where('username',$request->user_id)->first();
        
        if($userDetail)
        {
           $data = [
                    'user_id' => $userDetail->id,
                    'user_id_fk' => $userDetail->username,
                    'amount' => $request->amount,
                    'status' => 'Approved',
                    'credit_type' =>0,
                    'bdate' => Date("Y-m-d"),
                ];
               $payment =  \DB::table('debitfunds')->insert($data);


          $notify[] = ['success', 'Fund Debit successfully'];
          return redirect()->back()->withNotify($notify);   
        }
        else
        {
          return Redirect::back()->withErrors(array('Invalid User ID'));  
        }

             
      }
       catch(\Exception $e){
        Log::info('error here');
        Log::info($e->getMessage());
        print_r($e->getMessage());
        die("hi");
        return  redirect()->route('admin.fundTransfer')->withErrors('error', $e->getMessage())->withInput();
    }

}





    public function fund_report(Request $request)
    {


        $limit = $request->limit ? $request->limit :  paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = BuyFund::where('status','Approved')->orderBy('id', 'DESC');;

        if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
                $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
                ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', '%' . $search . '%')
                ->orWhere('type', 'LIKE', '%' . $search . '%')
                ->orWhere('amount', 'LIKE', '%' . $search . '%');
            });

            }

            $notes = $notes->paginate($limit)
            ->appends([
                'limit' => $limit
            ]);

                $this->data['add_fund_report'] =  $notes;
                $this->data['search'] = $search;
                $this->data['page'] = 'admin.fund.fund-report';
                return $this->admin_dashboard();
    }


    public function transfer_report(Request $request)
    {


        $limit = $request->limit ? $request->limit :  paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Debitfund::orderBy('id', 'DESC');

        if($search <> null && $request->reset!="Reset"){
            $notes = $notes->where(function($q) use($search){
                $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')          
                ->orWhere('user_id', 'LIKE', '%' . $search . '%')
                ->orWhere('amount', 'LIKE', '%' . $search . '%')
                ->orWhere('bdate', 'LIKE', '%' . $search . '%')
                ->orWhere('amount', 'LIKE', '%' . $search . '%');
            });

            }

            $notes = $notes->paginate($limit)
            ->appends([
                'limit' => $limit
            ]);

                $this->data['add_fund_report'] =  $notes;
                $this->data['search'] = $search;
                $this->data['page'] = 'admin.fund.transfer-report';
                return $this->admin_dashboard();
    }


    public function fund_request_done(Request $request)
    {

       $id= $request->id ; // or any params
       $user_id= $request->user_Id ; // or any params
       $withdraw_status= $request->withdraw_status ; // or any params
        $user = BuyFund::where('id',$id)->first();
        $user_detail = User::where('id',$user_id)->first();

     if ($withdraw_status=="success")
      {
            //  sendEmail($user_detail->email, 'FUND APPROVED SUCCESSFULLY ', [
            //     'name' => $user_detail->name,
            //     'username' => $user_detail->username,
            //     'amount' => $user->amount,
            //     'viewpage' => 'fund-approved',
            //      'link'=>route('login'),
            // ]);
            
            
          $update_data['status']= 'Approved';
          BuyFund::where('id',$id)->update($update_data);


     $notify[] = ['success', 'Fund request Approved successfully'];
     return redirect()->back()->withNotify($notify);
      }
      else
      {
         $update_data['status']= 'Failed';
   //   $user =  Investment::where('id',$id)->delete();
        BuyFund::where('id',$id)->update($update_data);
  
      $notify[] = ['success', 'Fund request Rejected successfully'];
      return redirect()->back()->withNotify($notify);
      }




   }
}
