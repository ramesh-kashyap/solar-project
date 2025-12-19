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


  public function fundActivation(Request $request)
{
    $validation = Validator::make($request->all(), [
        'amount' => 'required|numeric|min:50',
        'username' => 'required|exists:users,username',
        'transaction_password' => 'required',
    ]);

    if ($validation->fails()) {
        return redirect()->route('user.invest')
            ->withErrors($validation->getMessageBag()->first())
            ->withInput();
    }

    $user = Auth::user();
    $password = $request->transaction_password;
    $amount = $request->amount;

    try {
        if (!Hash::check($password, $user->tpassword)) {
            return Redirect::back()->withErrors(['Invalid Transaction Password']);
        }

        if ($user->fund_balance() < $amount) {
            return Redirect::back()->withErrors(['Insufficient balance in your account.']);
        }

        $user_detail = User::where('username', $request->username)->latest()->first();
        $existingInvestment = Investment::where('user_id', $user_detail->id)
            ->where('status', '!=', 'Decline')
            ->latest()->first();

        if ($existingInvestment) {
            return Redirect::back()->withErrors(['User ID already Active.']);
        }

        DB::beginTransaction();

        // Record the investment
        $investmentData = [
            'transaction_id' => md5(time() . rand()),
            'user_id' => $user_detail->id,
            'user_id_fk' => $user_detail->username,
            'amount' => $amount,
            'payment_mode' => 'USDT',
            'status' => 'Active',
            'sdate' => now()->toDateString(),
            'active_from' => $user->username,
            'walletType' => 1,
        ];

        Investment::create($investmentData);
        
        
           $UpgradeData = [
            'transaction_id' => md5(time() . rand()),
            'user_id' => $user_detail->id,
            'user_id_fk' => $user_detail->username,
            'amount' => 20,
            'payment_mode' => 'USDT',
            'status' => 'Active',
            'sdate' => now()->toDateString(),
            'active_from' => $user->username,
            'walletType' => 1,
            'round'   =>1,
        ];

        Upgrade::create($UpgradeData);
        

        // Update user status and handle placement
        if ($user_detail->active_status === "Pending") {
            User::where('id', $user_detail->id)->update([
                'active_status' => 'Active',
                'adate' => now(),
                'package' => $amount,
                'rank' => 1
            ]);

            $round = 'round1';
            $parentUsername = $user_detail->sponsor_detail->username ?? '';
            // dd($parentUsername);
            $placement = findAvailablePlacement($round, $parentUsername);
            // dd($placement);
            $pos = $placement['position'] ?? 'Left';
            $sponsor = $placement['placement_id'] ?? 0;

            $sponsorLevel = DB::table($round)->where('user_id_fk', $sponsor)->first();
            $level = $sponsorLevel ? $sponsorLevel->level + 1 : 0;

            DB::table($round)->updateOrInsert(
                ['user_id_fk' => $user_detail->username],
                [
                    'ParentId' => $sponsor,
                    'sponsor' => $sponsor,
                    'level' => $level,
                    'user_id' => $user_detail->id,
                    'position' => $pos,
                    'isFake' => 0,
                ]
            );

            autoFillFakeUsers($user_detail->username);
        } else {
            $newPackage = $user_detail->package + $amount;
            User::where('id', $user_detail->id)->update([
                'active_status' => 'Active',
                'package' => $newPackage
            ]);
        }

        add_level_income($user_detail->id, $amount);

        DB::commit();

        return redirect()->route('user.invest')
            ->withNotify([['success', 'User activation submitted successfully.']]);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Fund Activation Error: ' . $e->getMessage());
            print_r($e->getMessage());
    die("hi");
        return redirect()->route('user.invest')
            ->withErrors(['error' => 'An error occurred. Please try again.'])
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
