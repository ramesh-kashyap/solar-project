<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Income;
use App\Models\Referral;
use App\Models\UserExtra;
use App\Models\BuyFund;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use DB;
use Carbon\Carbon;

class Cron extends Controller
{




public function index($round)
{  
    $allResult = \DB::table('round'.$round)->where('isComplete', 0)->where('isFake',0)->get();

    if ($allResult) {
        foreach ($allResult as $key => $value) {
            $userName = $value->user_id_fk;
            $userID = $value->user_id;
            $userDetail = User::where('id', $userID)->first();

            $myLevelTeam = $this->my_level_team_count($userName, 'round'.$round); 
            $totalTeam = (is_array($myLevelTeam) && $myLevelTeam ? count($myLevelTeam) : 0);

            $plan = \DB::table('plan')->where('id', $round)->first();
    // dd($totalTeam);
            if ($totalTeam >= 14) {
                $remarks = "Autopool Income";
                $checkIncome = Income::where('user_id_fk', $userName)
                    ->where('round', $round)
                    ->where('remarks', $remarks)
                    ->first();

                if (!$checkIncome) {
                    echo "ID: ".$userName."<br>";

                    $data = [
                        'remarks' => $remarks,
                        'comm' => $plan->bonus,
                        'amt' => $plan->bonus,
                        'round' => $round,
                        'level' => 1,
                        'ttime' => date("Y-m-d"),
                        'user_id_fk' => $userName,
                        'user_id' => $userDetail->id
                    ];
                    Income::create($data);

                    \DB::table('round'.$round)
                        ->where('user_id_fk', $userName)
                        ->update(['isComplete' => 1]);

                    // Prepare next round
                    $nextRound = $round + 1;
                    $nextPlan = \DB::table('plan')->where('id', $nextRound)->first();
                    $nextRoundTable = 'round'.$nextRound;

                    $uplineResult =findFirstActiveUpline($userDetail->id, $nextPlan->package ?? 0);
                    $parentUsername = $uplineResult['id'] ?? '';

                    // Find placement
                    $placement = findAvailablePlacement($nextRoundTable, $parentUsername);
                    $pos = $placement['position'] ?? 'Left';
                    $sponsor = $placement['placement_id'] ?? 0;

                    $sponsorLevel = DB::table($nextRoundTable)
                        ->where('user_id_fk', $sponsor)
                        ->first();

                    $level = $sponsorLevel ? $sponsorLevel->level + 1 : 0;

                    DB::table($nextRoundTable)->updateOrInsert(
                        ['user_id_fk' => $userDetail->username],
                        [
                            'ParentId' => $sponsor,
                            'sponsor' => $sponsor,
                            'level' => $level,
                            'user_id' => $userDetail->id,
                            'position' => $pos,
                        ]
                    );

                    DB::table('upgrades')->updateOrInsert(
                        ['user_id_fk' => $userDetail->username,'amount'=>$nextPlan->package],
                        [
                        'transaction_id' => md5(time() . rand()),
                        'user_id' => $userDetail->id,
                        'user_id_fk' => $userDetail->username,
                        'amount' => $nextPlan->package,
                        'payment_mode' => 'USDT',
                        'status' => 'Active',
                        'sdate' => now()->toDateString(),
                        'active_from' => $userDetail->username,
                        'round' => $nextRound,
                        'walletType' => 1,
                        ]
                    );

                    // Fill fake users under this real user
                    autoFillFakeUsers($userDetail->username,$nextRoundTable);
                }
            }
        }
    }
}



    public function my_level_team_count($userid,$pool,$level=3){
      $arrin=array($userid);
      $ret=array();

      $i=1;
      while(!empty($arrin)){
          $alldown=\DB::table($pool)->select('user_id_fk')->whereIn('sponsor',$arrin)->get()->toArray();     
          if(!empty($alldown)){
              $arrin = array_column($alldown,'user_id_fk');
              $ret[$i]=$arrin;
              $i++;

              if ($i>$level) {
               break;
              }
            
          }else{
              $arrin = array();
          } 
      }   
     
       $final = array();         
       if(!empty($ret)){
           array_walk_recursive($ret, function($item, $key) use (&$final){
               $final[] = $item;
           });
       }
      
      
      return $final;
      
  }




public function dynamicupicallback(Request $request)
{
    try {
        $queryData = $request->query();
        Log::info('Incoming callback data: ' . json_encode($queryData));

        // Save raw JSON
        // Activitie::create(['data' => json_encode($queryData)]);

        $validAddresses = [
            "0x05CE595b53295E51b4Ddd22aF68274f907E63904",
            "TJPhCR5fbJH9fS7ubEQz59FQ4hLbWd9jAh"
        ];

        if (
            in_array($queryData['address_out'], $validAddresses) &&
            $queryData['result'] === "sent" &&
            in_array($queryData['coin'], ['bep20_usdt', 'trc20_usdt'])
        ) {
            $txnId = $queryData['txid_in'];
            $userName = $queryData['refid'];

            $exists = BuyFund::where('txn_no', $txnId)->exists();

            if (!$exists) {
                Log::info("Processing new transaction: {$txnId} for user: {$userName}");

                $amount = number_format((float) $queryData['value_coin'], 2, '.', '');
                $blockchain = $queryData['coin'] === 'bep20_usdt' ? 'USDT_BSC' : 'USDT_TRON';

                $user = User::where('username', $userName)->first();
                if (!$user) {
                    return response()->json([
                        'message' => 'User not found',
                        'status' => false,
                    ]);
                }

                $now = Carbon::now();
                $invoice = rand(1000000, 9999999);
                
                // Insert investment
                BuyFund::insert([
                    'txn_no' => $txnId,
                    'user_id' => $user->id,
                    'user_id_fk' => $user->username,
                    'amount' => $amount,
                    'type' => $blockchain,
                    'status' => 'Approved',
                    'bdate' => $now,
                    'created_at' => $now,
                ]);
              

              

            }
        }

        return response()->json([
            'message' => 'Callback processed',
            'status' => true,
        ]);
    } catch (\Exception $e) {
        Log::error('UPI Callback Error: ' . $e->getMessage());
        return response()->json([
            'message' => 'Failed',
            'status' => false,
        ]);
    }
}



public function reward_bonus()
    {  

date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $allResult=User::where('active_status','Active')->get();
// print_r($allResult);die;
    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
      $user_id=$value->id;
      
      $username=$value->username;
      $days=100;
     $mtching=Income::where('user_id',$user_id)->where('remarks','Matching Income')->orderBy('id', 'DESC')->limit(1)->first();
    $matchAmt=($mtching)?$mtching->amt:0; 
     $rank=0;
     if($matchAmt>=100000)
     {
    
      if($matchAmt>=100000 && $matchAmt<500000)
      {
          $amount = 1000;
          $rank = 1;
      }
        
      if($matchAmt>=500000 && $matchAmt<1000000)
      {
          $amount = 6000;
          $rank = 2;
      }
          if($matchAmt>=1000000 && $matchAmt<2500000)
      {
          $amount = 10000;
          $rank = 3;
      }
          if($matchAmt>=2500000 && $matchAmt<5000000)
      {
          $amount = 25000;
          $rank = 4;
      }
          if($matchAmt>=5000000 && $matchAmt<10000000)
      {
          $amount = 75000;
          $rank = 5;
      }
          if($matchAmt>=10000000 && $matchAmt<50000000)
      {
          $amount = 150000;
          $rank = 6;
      }
          if($matchAmt>=50000000 && $matchAmt<100000000)
      {
          $amount = 750000;
          $rank = 7;
      }
          if($matchAmt>=100000000 && $matchAmt<250000000)
      {
          $amount = 1500000;
          $rank = 8;
      }
          if($matchAmt>=250000000 && $matchAmt<1000000000)
      {
          $amount =5000000;
          $rank = 9;
      }
          if($matchAmt>=1000000000)
      {
          $amount = 20000000;
          $rank = 10;
      }
        
        
         
    //  $check_level=Income::where('remarks','Monthly Royalty')->where('amt',$amount)->count("id");
     
     if($amount>0)
     {
         
              echo "<br>";
          echo "ID : ".$username."<br>";
        //   echo "Level : ".$Level;
            $award['remarks'] = 'Monthly Royalty';
            $award['amt'] = $amount;
            $award['comm'] = $amount;
            $award['level']=0;
            $award['ttime'] = date("Y-m-d");
            $award['user_id_fk'] =$username;
            $award['user_id']=$user_id; 
          $income = Income::firstOrCreate(['remarks' => 'Monthly Royalty','ttime'=>date("Y-m-d"),'user_id'=>$user_id],$award);    
          
           User::where('id',$user_id)->update(['rank' => $rank]);      
        add__super_direct_income($user_id,$amount);      
     }
     
     
     }
   
     
       }
    
     
      
     
     }
    } 






public function referral_bonus()
    {  

    $allResult=User::where('active_status',"Active")->get();
// print_r($allResult);die;
    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
      $userID=$value->id;
      
      $username=$value->username;
     
     
         
         $joiningamt = Investment::where('user_id', $userID)->where('status','Active')->sum("amount");
         $total_profit_b = Income::where('user_id', $userID)->sum("comm");
         $total_profit=($total_profit_b)?$total_profit_b:0;
        $max_income=$joiningamt*5;
        $n_m_t = $max_income - $total_profit;
        // dd($n_m_t);
          if($n_m_t<=0)
          {
             User::where('id',$value->id)->update(['active_status' => "Inactive"]);      
          }
          
   
     
       }
    
     
      
     
     }
    } 






   
        public  function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        // print_r($arrin);die();
        while(!empty($arrin)){
         $alldown= User::select('id')->whereIn('Parentid',$arrin)->get()->toArray();
         if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[]=$arrin;
              
              
            }else{
                $arrin = array();
            } 
        }
        // continue;    
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }  

        public  function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=User::where('Parentid',$userid)->where('position',$position)->first();
        if($get_position_user){
        
            $ret=$this->my_binary($get_position_user->id);
            $ret[]=$get_position_user->id;
        }
       
        return $ret;
    }


  public function get_total_invest_by_team($user_ids)
    {
      
     $business= Investment::whereIn('user_id',$user_ids)->where('status','Active')->sum('amount');
     return $business;
        
    }
    
    

 public function matching_bonus2()

    {  
        
set_time_limit(120); // Set the time limit to 120 seconds

   date_default_timezone_set("Asia/Kolkata");
//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->cursor();

    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
       $userID=$value->id;
        $userName=$value->username;
        $Package=$value->package;

          $capping=$Package;
        
       
      $rightTeam=$this->team_by_position($userID,'Right');
      $leftTeam=$this->team_by_position($userID,'Left');
    

         $total_right=(!empty($rightTeam))?count($rightTeam):0;
         $total_left=(!empty($leftTeam))?count($leftTeam):0;
         
         
         if(($total_right>1) && ($total_left>0) || ($total_left>1) && ($total_right>0))
       {

            $left_business=$this->get_total_invest_by_team($leftTeam);
          $right_business=$this->get_total_invest_by_team($rightTeam);

    
             $tleftpackage=($left_business)? $left_business:0;
             $trightpackage=($right_business)? $right_business:0;
    
              if($tleftpackage<$trightpackage)
               {
               $amount = $tleftpackage;   
               $curry = $trightpackage-$tleftpackage;     
               }
              if($tleftpackage>$trightpackage)
              {
               $amount = $trightpackage;   
               $curry = $tleftpackage-$trightpackage;      
              }
              if($tleftpackage==$trightpackage)
              {
                $amount = ($trightpackage);
    
                $curry = $tleftpackage-$trightpackage;
    
              }
    
          $mtching=Income::where('user_id',$userID)->where('remarks','Matching Income')->orderBy('id', 'DESC')->limit(1)->first();
          
           $amount=$amount;
           $tamount = $amount;
           
          $amount = $amount - (!empty($mtching)?$mtching->amt:0);
         
         
          $amount = ($amount/100)*8;  
         
            $idate = date("Y-m-d");
              $total_today= Income::where('user_id',$userID)->sum('comm');
                      //print_r($user_id_fk);die;
              $joiningAMt = Investment::where('user_id',$userID)->where('status','Active')->sum("amount");
             $max_income=$joiningAMt*3;
               $n_m_t = $max_income - $total_today;
              if($amount >= $n_m_t)
              {
                  $amount = $n_m_t;
                  
              User::where('id',$userID)->update(['active_status' => "Inactive"]);      
              Investment::where('user_id',$userID)->update(['roiCandition' => 1]);   
              }
                          
        
         
        
              if($amount>=$capping)
              {
                 $amount = $capping;
              }
        if($amount>0)
        {
         
          //   print_r($amount);die();
        
        
           
            echo "ID:".$userName." amounts:".$amount."<br>";
             $data['remarks'] = 'Matching Income';
            $data['comm'] = $amount;
            $data['amt'] = $tamount;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userName;
            $data['level']=1;
            $data['tleft']=$tleftpackage;
            $data['tright']=$trightpackage;
            $data['user_id']=$userID; 
            $data['curry']=$curry;
     $income = Income::firstOrCreate(['remarks' => 'Matching Income','ttime'=>date("Y-m-d"),'user_id'=>$userID],$data);

     add__super_direct_income($userID,$amount);   
        }
                          
       
          


      }
       

     

      }
   }
}


 public function matching_bonus()

    {  
        
set_time_limit(120); // Set the time limit to 120 seconds

   date_default_timezone_set("Asia/Kolkata");
//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->cursor();

    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
       $userID=$value->id;
        $userName=$value->username;
        $Package=$value->package;

          $capping=$Package;
        
       
    //   $rightTeam=$this->team_by_position($userID,'Right');
    //   $leftTeam=$this->team_by_position($userID,'Left');
      $UserExtra = UserExtra::where('user_id',$userID)->where('bv_left', '>',0)->where('bv_right', '>',0)->first();
  
    
     if($UserExtra)
     {
         $total_right=$UserExtra->paid_right;
         $total_left=$UserExtra->paid_left;
         
        
         if(($total_right>=1) && ($total_left>=0) || ($total_left>=1) && ($total_right>=0))
       {


 

          $left_business=$UserExtra->bv_left;
          $right_business=$UserExtra->bv_right;

         $tleftpackage=($left_business)? $left_business:0;
         $trightpackage=($right_business)? $right_business:0;

          if($tleftpackage<$trightpackage)
           {
           $amount = $tleftpackage;   
           $curry = $trightpackage-$tleftpackage;     
           }
          if($tleftpackage>$trightpackage)
          {
           $amount = $trightpackage;   
           $curry = $tleftpackage-$trightpackage;      
          }
          if($tleftpackage==$trightpackage)
          {
            $amount = ($trightpackage);

            $curry = $tleftpackage-$trightpackage;

          }
    
          $mtching=Income::where('user_id',$userID)->where('remarks','Matching Income')->orderBy('id', 'DESC')->limit(1)->first();
          
           $amount=$amount;
           $tamount = $amount;
           
          $amount = $amount - (!empty($mtching)?$mtching->amt:0);
         
          $amount = ($amount/100)*8;  
         
            $idate = date("Y-m-d");
              $total_today= Income::where('user_id',$userID)->sum('comm');
              
              $joiningAMt = Investment::where('user_id',$userID)->where('status','Active')->sum("amount");
              
              $max_income=$joiningAMt*3;
               $n_m_t = $max_income - $total_today;
               
              if($amount >= $n_m_t)
              {
              $amount = $n_m_t;
              User::where('id',$userID)->update(['active_status' => "Inactive"]);      
              Investment::where('user_id',$userID)->update(['roiCandition' => 1]);   
              }
                          
        
         
        
              if($amount>=$capping)
              {
                 $amount = $capping;
              }
        if($amount>0)
        {
         
          //   print_r($amount);die();
            echo "ID:".$userName." amounts:".$amount."<br>";
             $data['remarks'] = 'Matching Income';
            $data['comm'] = $amount;
            $data['amt'] = $tamount;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userName;
            $data['level']=1;
            $data['tleft']=$tleftpackage;
            $data['tright']=$trightpackage;
            $data['user_id']=$userID; 
            $data['curry']=$curry;
     $income = Income::firstOrCreate(['remarks' => 'Matching Income','ttime'=>date("Y-m-d"),'user_id'=>$userID],$data);

     add__super_direct_income($userID,$amount);   
        }
                          
       
          


      }
       

     }

      }
   }
}


 public function manageMatching($start,$end)

    {  
        
set_time_limit(120); // Set the time limit to 120 seconds

   date_default_timezone_set("Asia/Kolkata");
//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('id','>=',$start)->where('id','<=',$end)->cursor();

    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
       $userID=$value->id;
        $userName=$value->username;
        $Package=$value->package;

          $capping=$Package;
        
       
       $rightTeam=$this->team_by_position($userID,'Right');
       $leftTeam=$this->team_by_position($userID,'Left');

        $left_team=User::whereIn('id',$leftTeam)->get(); 
        $right_team=User::whereIn('id',$rightTeam)->get(); 
       
       $leftPaid = $left_team->whereIn('active_status',['Active','Inactive','Block'])->count();
       $leftfree = $left_team->where('active_status','Pending')->count();
       $rightPaid = $right_team->whereIn('active_status',['Active','Inactive','Block'])->count();
       $rightfree = $right_team->where('active_status','Pending')->count();
      $left_business=$this->get_total_invest_by_team($leftTeam);
      $right_business=$this->get_total_invest_by_team($rightTeam);
   
       $user_extras = new UserExtra();
       $user_extras->user_id = $userID;
       $user_extras->paid_left = $leftPaid;
       $user_extras->paid_right = $rightPaid;
       $user_extras->free_left = $leftfree;
       $user_extras->free_right = $rightfree;
       $user_extras->bv_left = $left_business;
       $user_extras->bv_right = $right_business;
       $user_extras->save();
   
   
       



      }
   }
}




}
