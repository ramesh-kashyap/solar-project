<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use Auth;
use Log;
use Redirect;
use Hash;
use App\Mail\Sendmail;

use Validator;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Profile extends Controller
{

    public function index()
    {
    $user=Auth::user();
    $profile_data = User::where('id',$user->id)->orderBy('id','desc')->first();
    $this->data['profile_data'] =$profile_data;
    $this->data['page'] = 'user.profile.profile-setting';
    return $this->dashboard_layout();

    }


    public function change_password()
    {
    $this->data['page'] = 'user.profile.ChangePass';
    return $this->dashboard_layout();

    }

      public function trx_change_password()
    {
    $this->data['page'] = 'user.profile.trx-password';
    return $this->dashboard_layout();

    }
    


    public function BankDetail()
    {
    $user=Auth::user();
    $bank = Bank::where('user_id',$user->id)->first();
    $this->data['bank_value'] = $bank;
    $this->data['page'] = 'user.profile.BankDetail';
    return $this->dashboard_layout();

    }

    public function profile_update(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'email' => 'required|string',
                //  'usdtBep20' => 'required',
                'phone' => 'required|numeric',

            ]);
            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());

                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            $user=Auth::user();
            $id=Auth::user()->id;

           
          $post_array  = $request->all();

       
          $update_data['phone']=$post_array['phone'];
          $update_data['email']=$post_array['email'];
       
        //   $update_data['usdtBep20']=$post_array['usdtBep20'];
          $user =  User::where('id',$id)->update($update_data);


        $notify[] = ['success', 'Profile Updated successfully'];
        return redirect()->back()->withNotify($notify);

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
          dd($e->getMessage());
            return back()->withErrors('error', $e->getMessage())->withInput();
        }
    }


    public function change_password_post(Request $request)
    {

        try {
            $data = $request->all();
            $rules = array('old_password' => 'required', 'password' => 'required|confirmed');
            $msg = [
                'old_password.required'     => 'Old Password is required',
                'password.required'         => 'Password is required' ,
                'password.confirmed'        => 'Password must match'    ,
            ];

            $validator = Validator::make($data, $rules, $msg);
            if ($validator->fails())
                return Redirect::back()->withErrors($validator->getMessageBag()->first());

            $user = Auth::user();


            if (!\Hash::check($data['old_password'], $user->password))
                return Redirect::back()->withErrors('Current Password is incorrect');

             User::where('id', $user->id)->update(array(
                'password' => \Hash::make($data['password']),
                'PSR' => $data['password'],
                'updated_at' => new \DateTime
            ));

            $notify[] = ['success', 'password updated successfully'];
            return redirect()->back()->withNotify($notify);

        } catch (\Exception $e) {
            return Redirect::back()->witherrors($e->getMessage())->withInput();
        }

    }

  public function sendCode(Request $request)
    {

        $user=Auth::user();
        $code = verificationCode(6);
      
        $emailId = $request->emailId;
        if ($emailId!="") 
        {
          $emailId = $emailId;
        }
        else
        {
            $emailId = $user->email;
        }
       
        PasswordReset::where('email', $emailId)->delete();

        $password = new PasswordReset();
        $password->email = $emailId;
        $password->token = $code;
        $password->created_at = \Carbon\Carbon::now();
        $password->save();

           sendEmail($emailId, 'Your One-Time Password', [
            'name' => $user->name,
            'code' => $code,
            'purpose' => 'Change Password',
            'viewpage' => 'one_time_password',

         ]);

       return true;
    }
    public function change_trxpassword_post(Request $request)
    {

        try {
            $data = $request->all();
            $rules = array('password' => 'required|confirmed');
            $msg = [
                'password.required'         => 'Password is required' ,
                'password.confirmed'        => 'Password must match'    ,
            ];

            $validator = Validator::make($data, $rules, $msg);
            if ($validator->fails())
                return Redirect::back()->withErrors($validator->getMessageBag()->first());

            $user = Auth::user();

            
            $code = $request->code;
            if (PasswordReset::where('token', $code)->where('email', $user->email)->count() != 1) {
                $notify[] = ['error', 'Invalid token'];
                return redirect()->route('user.trx-password')->withNotify($notify);
            }
            
                date_default_timezone_set('Asia/Kolkata');
                $today = date("Y-m-d H:i:s");  
                User::where('id', $user->id)->update(array(
                'tpassword' => \Hash::make($data['password']),
                 'TPSR' => $data['password'],
                //  'detail_changed_date' =>$today,
                'updated_at' => new \DateTime
            ));

           // return Redirect::Back()->with('messages', 'Transaction password updated successfully');

            $notify[] = ['success', 'Transaction password updated successfully'];
            return redirect()->back()->withNotify($notify);

        }
         catch (\Exception $e) {
            return Redirect::back()->witherrors($e->getMessage())->withInput();
        }

    }



    public function bank_profile_update(Request $request)

    {
        try{
            $validation =  Validator::make($request->all(), [
                'account_holder' => 'required',
                'bank_name' => 'required',
                'branch_name' => 'required',
                'ifsc_code' => 'required',
                'account_number' => 'required',

            ]);
            if($validation->fails()) {
                Log::info($validation->getMessageBag()->first());
                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }

            

            $id=Auth::user()->id;


             $check_exist=Bank::where('user_id', $id)->first();

             $bank_array=array(

                 'user_id'=>$id,
                 'bank_name'=>$request->bank_name,
                 'account_holder'=>$request->account_holder,
                 'branch_name'=>$request->branch_name,
                 'upi_id'=>$request->upi_id,
                 'account_no'=>$request->account_number,
                 'ifsc_code'=>$request->ifsc_code,
             );

             if (!$check_exist)
             {

              $bank=Bank::create($bank_array);
            }
            else
            {
                $bank= Bank::where('user_id', $id)->update($bank_array);
            }




        $notify[] = ['success', 'Bank Updated successfully'];
        return redirect()->back()->withNotify($notify);

          }
           catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();

        }
    }




}
