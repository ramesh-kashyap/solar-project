<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investment;
use App\Models\Income;
use App\Models\Upgrade;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Log;
use Redirect;
use Hash;
use Illuminate\Support\Facades\DB;


class Invest extends Controller
{

  private $downline = "";

    public function index()
    {
        $user=Auth::user();
        $invest_check=Investment::where('user_id',$user->id)->where('status','!=','Decline')->orderBy('id','desc')->limit(1)->first();

        $this->data['last_package'] = ($invest_check)?$invest_check->amount:0;
        $this->data['page'] = 'user.invest.Deposit';
        return $this->dashboard_layout();
    }









public function confirmDeposit(Request $request)
{
    $validator = Validator::make($request->all(), [
        'amount'      => 'required|numeric',
        'paymentMode' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $this->data['amount'] = $request->amount;
    $this->data['paymentMode'] = $request->paymentMode;
    $this->data['page'] = 'user.invest.confirmDeposit';

    return $this->dashboard_layout();
}






 



  public function fundActivation(Request $request)
  {
    try {
      // âœ… Validation
      $validation = Validator::make($request->all(), [
        'amount' => 'required|numeric',
        'paymentMode' => 'required',
        'utrno' => 'required',
      ]);

      if ($validation->fails()) {
        Log::info($validation->getMessageBag()->first());
        return redirect()
          ->route('user.invest')
          ->withErrors($validation->getMessageBag()->first())
          ->withInput();
      }

      // âœ… Current logged-in user
      $user = Auth::user();
      $user_detail = User::where('username', $user->username)
        ->orderBy('id', 'desc')
        ->first();

      // âœ… Latest investment check
      $invest_check = Investment::where('user_id', $user_detail->id)
        ->where('status', '!=', 'Decline')
        ->orderBy('id', 'desc')
        ->first();



$pendingRequest = Investment::where('user_id', Auth::id())
            ->where('status', 'Pending')
            ->exists();

        if ($pendingRequest) {
            return redirect()
                ->route('user.invest')
                ->withErrors('Your previous deposit request is still pending. Please wait for approval.')
                ->withInput();
        }




      $invoice = substr(str_shuffle("0123456789"), 0, 7);
      $joining_amt = $request->amount;
      $last_package = $invest_check ? $invest_check->amount : 0;

      // âœ… Handle file upload
      if ($request->hasFile('account')) {
        $image = $request->file('account');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/'), $imageName);
      } else {
        $imageName = null;
      }

      // âœ… Store in DB
      $data = [
        'transaction_id'         => $request->utrno,
        'user_id'       => $user_detail->id,
        'user_id_fk'    => $user_detail->username,
        'amount'        => $request->amount,
        'status'        => 'Pending',
        'payment_mode'  => $request->paymentMode, 
        'slip'          => $imageName,
        'sdate'         => date("Y-m-d"),
      ];

      Investment::insert($data);

      // âœ… Success message
      $notify[] = ['success', 'Your Deposit request has been submitted successfully'];
      return redirect()->route('user.invest')->withNotify($notify);
    } catch (\Exception $e) {
      Log::info('error here');
      Log::info($e->getMessage());
      return redirect()
        ->route('user.invest')
        ->withErrors($e->getMessage())
        ->withInput();
    }
  }





  public function ditributor_gap_margin($userid,$gapMarginBonus,$amt,$userPercent,$user_detail,$level=20){
        $arrin=$userid;
        $userPercent=$userPercent;
        // dd($userPercent);
        $gapMarginBonus=$gapMarginBonus;
        $ret=array();
        $i=1;
        while(!empty($arrin) && $gapMarginBonus>0){
            $alldown=User::where('id',$arrin)->get()->first();
            if($alldown){
                $arrin = $alldown->sponsor;
                $i++;
                
            
            $Sposnor_cnt = User::where('sponsor',$alldown->id)->where('active_status','Active')->count("id");  
            $percent=0;
            if($Sposnor_cnt>=4)
            {
              $percent = 20; 
              
             if($Sposnor_cnt>=6)
              {
                $percent = 30; 
              }
              if($Sposnor_cnt>=8)
              {
                $percent = 40; 
              }
              if($Sposnor_cnt>=10)
              {
                $percent = 50; 
              }  
            
             $sponsor_profit= $percent-$userPercent; 
             
           
             
             $preSponsor= $userPercent;
             if($sponsor_profit>$gapMarginBonus)
             {
                $sponsor_profit= $gapMarginBonus;
             }
           
              $gapMarginBonus=$gapMarginBonus-$sponsor_profit;
              
         
         
        //   echo "ID :".$alldown->id."<br>";
        //   echo "Per :".$percent."<br>";
        //   echo "User :".$userPercent."<br>";
        //   echo "SP :".$sponsor_profit."<br>";
              
              if($sponsor_profit>0 && $percent>$userPercent)
              {
                $sp_pp =  $amt* $sponsor_profit;
                
                  $data = [
              'user_id' => $alldown->id,
              'user_id_fk' =>$alldown->username,
              'amt' => $amt,
              'comm' => $sp_pp,
              'remarks' => 'Gap Margin Bonus',
              'level' => $i,
              'rname' => $user_detail->username,
              'fullname' => $user_detail->name,
              'ttime' => Date("Y-m-d"),
              ];
             Income::create($data);   
              }
              
              
            $userPercent= $percent;   
            }
            else
            {
             $userPercent=$userPercent;
              $gapMarginBonus=$gapMarginBonus;
            }
         
            if($i>$level || $alldown->id==1)
            {
                break;
            }
     

            }else{
                $arrin ='';
            }
        }
        
        // dd("hi");

       


        return true;

    }
    
      public  function find_9directSponsor($snode)
      {
          $q=User::where('id',$snode)->first();
          $sponsor=User::where('sponsor',$snode)->where('active_status','Active')->count();
          if ($sponsor>=10 || $q->id==1)
          {
            $this->downline = $snode; 
          }
          else
          {
            $user = $q->id;
            $this->find_9directSponsor($user);   
          }
      }

        public function invest_list(Request $request){

    $user=Auth::user();
      $limit = $request->limit ? $request->limit : paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Investment::where('user_id',$user->id);
      if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('type', 'LIKE', '%' . $search . '%')
          ->orWhere('amount', 'LIKE', '%' . $search . '%');
        });

      }

        $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

      $this->data['search'] =$search;
      $this->data['deposit_list'] =$notes;
      $this->data['page'] = 'user.invest.DepositHistory';
      return $this->dashboard_layout();


        }
   public function all_packages(Request $request){

    $user=Auth::user();
      $limit = $request->limit ? $request->limit : paginationLimit();
        $status = $request->status ? $request->status : null;
        $search = $request->search ? $request->search : null;
        $notes = Investment::where('active_from',$user->username)->where('user_id_fk','!=',$user->username);
      if($search <> null && $request->reset!="Reset"){
        $notes = $notes->where(function($q) use($search){
          $q->Where('user_id_fk', 'LIKE', '%' . $search . '%')
          ->orWhere('txn_no', 'LIKE', '%' . $search . '%')
          ->orWhere('status', 'LIKE', '%' . $search . '%')
          ->orWhere('type', 'LIKE', '%' . $search . '%')
          ->orWhere('amount', 'LIKE', '%' . $search . '%');
        });

      }

        $notes = $notes->paginate($limit)->appends(['limit' => $limit ]);

      $this->data['search'] =$search;
      $this->data['deposit_list'] =$notes;
      $this->data['page'] = 'user.invest.AllDepositHistory';
      return $this->dashboard_layout();


        }

}
