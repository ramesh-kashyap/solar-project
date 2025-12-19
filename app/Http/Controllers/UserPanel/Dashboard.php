<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Investment;
use App\Models\Withdraw;
use App\Models\Income;
use App\Models\UserExtra;
use Carbon\Carbon;
use Redirect;
use Log;
use Hash;

class Dashboard extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

      $user=Auth::user();
      $user_direct=User::where('sponsor',$user->id)->where('active_status','Active')->count();
      $personal_deposit=Investment::where('user_id',$user->id)->where('status','Active')->sum('amount');
      $left_team=$this->team_by_position($user->id,'Left');               
      $right_team=$this->team_by_position($user->id,'Right');   

      $totalBusiness=$this->my_direct_business_count($user->id);
   //   print_r($tolteam);die;
    //   $total_team=(!empty($tolteam)?count($tolteam):0);
    //    dd($left_team);
      $deposit_report = Investment::where('user_id',$user->id)->orderBy('id','desc')->get();

     $totalIncome = Income::where('user_id',$user->id)->sum('comm');
      $weekly_profit = Income::where('user_id',$user->id)
      ->whereBetween('ttime', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('comm');

        $transaction_data = Income::where('user_id',$user->id)->orderBy('id', 'desc')->take(10)->get();
        
        if($user->active_status!="Pending")
        {
          $toDate = date('Y-m-d H:i:s', strtotime($user->adate. ' + 2 day'));
        $this->data['sponsor_cnt'] =User::where('sponsor',$user->id)->where('package','>=',($user->package)?$user->package:0)->whereBetween('adate', [$user->adate, $toDate])->where('active_status','Active')->count();
           
        }
        else
        {
          $this->data['sponsor_cnt'] =0;  
        }
       
        
        $this->data['left_business'] =Investment::whereIn('user_id',$left_team)->where('status','Active')->sum('amount');
        $this->data['right_business'] =Investment::whereIn('user_id',$right_team)->where('status','Active')->sum('amount');
        $this->data['weekly_profit'] =$weekly_profit;
        $this->data['transaction_data'] =$transaction_data;
        $this->data['deposit_report'] =$deposit_report;
        $this->data['user_direct'] =$user_direct;
        $this->data['personal_deposit'] =$personal_deposit;
      $this->data['left_direct_team'] =User::where('sponsor',$user->id)->where('active_status','Active')->where('position','Left')->count();
      $this->data['right_direct_team'] =User::where('sponsor',$user->id)->where('active_status','Active')->where('position','Right')->count();
      $this->data['left_team'] =User::whereIn('id',$left_team)->where('active_status','Active')->count();
      $this->data['right_team'] = User::whereIn('id',$right_team)->where('active_status','Active')->count();
      $this->data['directBusiness'] =$totalBusiness;
      $this->data['userDetail'] =$user;
    //   dd($this->data['userDetail']);
       $this->data['remaining_amount'] =($personal_deposit*3)-$totalIncome;

      $this->data['page'] = 'user.dashboard';
      return $this->dashboard_layout();


    }

   public function new_register()
    {

      $user=Auth::user();
      $this->data['page'] = 'user.team.new-register';
      return $this->dashboard_layout();


    }  
    
    public function courses()
    {

      $user=Auth::user();
      $this->data['page'] = 'user.courses';
      return $this->dashboard_layout();


    }
    
      public function register_sucess()
    {

      $user=Auth::user();
      $this->data['page'] = 'user.team.register_sucess';
      return $this->dashboard_layout();


    }
    


    public function lastWithdrawal(Request $request)
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $validation =  Validator::make($request->all(), [
            'depositId' => 'required',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return redirect()->route('user.dashboard')->withErrors($validation->getMessageBag()->first())->withInput();
        }

         $user = Auth::user();
          $orderId=$request->depositId;
         $checkStatus= Investment::where('id',$orderId)->first();
        $output='';
        if($checkStatus)
        {
            
            
           $output.='
           
             <p>Great news! Your account on '.siteName().' has been successfully activated. You can now enjoy all the features and benefits of our platform.</p>
      
            
            
              
             
            <br>
                <div data-v-1a73b4ab="" data-v-06f511d8="" class="review"><img data-v-1a73b4ab="" src="'.asset('upnl/images/right.gif').'" alt="TrustPilot" height="70" class="review__img"> <h4 data-v-1a73b4ab="" class="review__title">
               Package  : '.$checkStatus->amount.'  '.$checkStatus->payment_mode.' <br>
               Name  : '.$checkStatus->user->name.'  <br>
               User ID  : '.$checkStatus->user_id_fk.'  <br>
              </h4> <div data-v-1a73b4ab="" class="review__hint">
               We are thrilled to have you on board. To get started
              </div> </div>
            
           ';
           
           return $output;
           
        }
        else
        {
            return 1;   
        }
    
    }


    public function lastWithdrawal2(Request $request)
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

        $validation =  Validator::make($request->all(), [
            'withdrawalId' => 'required',
        ]);

        if($validation->fails()) {
            Log::info($validation->getMessageBag()->first());
    
            return redirect()->route('user.dashboard')->withErrors($validation->getMessageBag()->first())->withInput();
        }

         $user = Auth::user();
          $orderId=$request->withdrawalId;
         $checkStatus= Withdraw::where('id',$orderId)->first();
        $output='';
        if($checkStatus)
        {
            
            
           $output.='
           
             <p>We are pleased to inform you that your recent withdrawal request has been successfully processed. The funds have been transferred from your account to the designated recipient or bank account.</p>
      
            
            
              
             
            <br>
                <div data-v-1a73b4ab="" data-v-06f511d8="" class="review"><img data-v-1a73b4ab="" src="'.asset('upnl/images/right.gif').'" alt="TrustPilot" height="70" class="review__img"> <h4 data-v-1a73b4ab="" class="review__title">
               Withdrawal Amount  : '.$checkStatus->amount.'  '.$checkStatus->payment_mode.' <br>
               Name  : '.$checkStatus->user->name.'  <br>
               User ID  : '.$checkStatus->user_id_fk.'  <br>
              </h4> <div data-v-1a73b4ab="" class="review__hint">
             Thank you for choosing '.siteName().'. We appreciate your business and look forward to serving you in the future
              </div> </div>
            
           ';
           
           return $output;
           
        }
        else
        {
            return 1;   
        }
    
    }


    
      public function register(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'email' => 'required',
                'name' => 'required',
                'country' => 'required',
                'position' => 'required',
                'password' => 'required|min:5',
                'sponsor' => 'required|exists:users,username',
                'phone' => 'required|numeric|min:10'
              
            ]);

            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            //check if email exist
          
            $user = User::where('username',$request->sponsor)->first();
            if(!$user)
            {
                return Redirect::back()->withErrors(array('Introducer ID Not Active'));
            }
            // $totalID = User::count();
            // $totalID++;
            // $username =substr(time(),4).$totalID;
            $username ="CV".substr(rand(),-2).substr(time(),-2).substr(mt_rand(),-2);
           $tpassword =substr(time(),-2).substr(rand(),-2).substr(mt_rand(),-1);
            $post_array  = $request->all();


            $data['name'] = $post_array['name'];
            $data['phone'] = $post_array['phone'];
            $data['username'] = $username;
            $data['email'] = $post_array['email'];
             $data['position'] = $post_array['position'];
            $data['password'] =   Hash::make($post_array['password']);
            $data['tpassword'] =   Hash::make($tpassword);
            $data['PSR'] =  $post_array['password'];
            $data['TPSR'] =  $tpassword;
            $data['country'] = $post_array['country'];
            $data['sponsor'] = $user->id;
            $data['package'] = 0;
            $data['jdate'] = date('Y-m-d');
            $data['created_at'] = Carbon::now();
            $data['remember_token'] = substr(rand(),-7).substr(time(),-5).substr(mt_rand(),-4);
            $this->downline="";
            $this->find_position($user->id,$post_array['position']);
            $sponsor_user =  $this->downline; 
          
            $data['level'] = $user->level+1;
 
          
             $data['ParentId'] =  $sponsor_user;
            $user_data =  User::create($data);
            $registered_user_id = $user_data['id'];
            $user = User::find($registered_user_id);
            
              $user_extras = new UserExtra();
              $user_extras->user_id = $user->id;
              $user_extras->save();
             
              updateFreeCount($user->id);
              
            return redirect()->route('user.register_sucess')->with('messages', $user);

        }
        catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
           
        }

          
    } 
   
    public function find_position($snode,$pos)
    {
        $q=User::select('id')->where('Parentid',$snode)->where('position',$pos)->first();
        if (empty($q))
         {
           $this->downline = $snode; 
         }
         else
         {
          $user = $q->id;
            // print_r($user);die();
          $this->find_position($user,$pos);   
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


    public function my_level_team_count($userid,$level=10){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=User::select('id')->whereIn('sponsor',$arrin)->get()->toArray();
            if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[$i]=$arrin;
                $i++;

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

    public function my_direct_business_count($userid){

        $totalBusiness=0;
        $alldown=User::select('id')->where('sponsor',$userid)->get()->toArray();
        if(!empty($alldown)){
            $arrin = array_column($alldown,'id');

         $totalBusiness=Investment::whereIn('user_id',$arrin)->where('status','Active')->sum("amount");
        }
    return $totalBusiness;

    }


    public function tradeOn()
    {
     date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
        $user = Auth::user();

   if($user->is_roi_on==1)
   {
      return Redirect::back()->withErrors(array('Gaming Profit Income Closed'));   
   }
    
    $allResult=Investment::where('status','Active')->where('user_id',$user->id)->where('roiCandition',0)->get();
$todays=Date("Y-m-d");
$day=Date("l");



if ($allResult) 
{
 
 foreach ($allResult as $key => $value) 
 {
  
  
//   dd($key);

  $userID=$value->user_id;
   $joining_amt = $value->amount;
 
  $userDetails=User::where('id',$userID)->where('active_status','Active')->first();
  $today=date("Y-m-d");
   $previous_date =date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

  if ($userDetails) 
  {
     $total_profit_b = Income::where('user_id', $userID)->where('invest_id', $value->id)->where('remarks','Gaming Profit Income')->sum("comm");
      $total_profit=($total_profit_b)?$total_profit_b:0;

         $firstPackage = Investment::where('user_id',$userID)->orderBy('id','ASC')->limit(1)->where('status','Active')->first();
            $firstPackage = ($firstPackage)?$firstPackage->amount:0;
        $toDate = date('Y-m-d H:i:s', strtotime($userDetails->adate. ' + 2 day'));




        $sponsor_cnt=User::where('sponsor',$userID)->where('package','>=',$firstPackage)->whereBetween('adate', [$userDetails->adate, $toDate])->where('active_status','Active')->count();
        //  dd($sponsor_cnt);

        $percent= 1.5;
        
        if ($sponsor_cnt>=2 && $key==0) 
        {
            $percent=3;
        }

      
       $roi = $joining_amt*$percent/100; 
       
          
         $total_profit_b = Income::where('user_id', $userID)->sum("comm");
         $joiningAMt = Investment::where('user_id',$userID)->where('status','Active')->sum("amount");
            $total_profit=($total_profit_b)?$total_profit_b:0;
            $max_income=$joiningAMt*3;
            $n_m_t = $max_income - $total_profit;
            // dd($total_received);
            if($roi >= $n_m_t)
            {
                $roi = $n_m_t;
                User::where('id',$userDetails->id)->update(['active_status' => "Inactive"]);      
                Investment::where('user_id',$userDetails->id)->update(['roiCandition' => 1]);   
            }
            
      
      if ($roi>0) 
      {

        echo "ID:".$userDetails->username." Package:".$joining_amt." Roi:".$roi."<br>";
         $data['remarks'] = 'Gaming Profit Income';
        $data['comm'] = $roi;
        $data['amt'] = $joining_amt;
        $data['level']=0;
        $data['invest_id']=$value->id;
        $data['ttime'] = date("Y-m-d");
        $data['user_id_fk'] = $userDetails->username;
        $data['user_id']=$userDetails->id; 
      $income = Income::firstOrCreate(['remarks' => 'Gaming Profit Income','ttime'=>date("Y-m-d"),'user_id'=>$userID,'invest_id'=>$value->id],$data);
      add__super_direct_income($userDetails->id,$roi);
      }
      else
      {
      Investment::where('id',$value->id)->update(['roiCandition' => 1]);   
      }



  }
  




 }
 
} 



    


     
     }
      
    
    

    


}
