<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\PasswordReset;
use App\Models\User;

class Login extends Controller
{


    // public function login(Request $request)
    // {

    //     $validation =  Validator::make($request->all(), [
    //         'username' => 'required',
    //         'password' => 'required|string',

    //     ]);

    //     // dd($request);
    //     $post_array  = $request->all();
    //     $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();

    //         if ($user->active_status == "Block") {
    //             Auth::logout();
    //             return Redirect::back()->withErrors(array('Invalid Username & Password'));
    //         }



    //         return redirect()->route('user.dashboard');
    //     } else {
    //         // echo "credentials are invalid"; die;
    //         return Redirect::back()->withErrors(array('Invalid Username & Password !'));
    //     }
    // }

    public function login(Request $request)
    {
        try {

            // Validation
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                $notify[] = ['error', 'Please fill all required fields!'];
                return Redirect::back()->withNotify($notify)->withInput();
            }

            // Credentials
            $credentials = $request->only('username', 'password');

            // Attempt login
            if (Auth::attempt($credentials)) {

                $user = Auth::user();

                // Check blocked user
                if ($user->active_status === "Block") {
                    Auth::logout();
                    $notify[] = ['error', 'Your account is blocked!'];
                    return Redirect::back()->withNotify($notify);
                }

                // Send SMS
                $this->sendSms($user->mobile, "Hello {$user->name}, you have successfully logged in.");

                // Success notify
                $notify[] = ['success', 'Login successful! SMS notification sent.'];
                return redirect()->route('user.dashboard')->withNotify($notify);
            }

            // Invalid credentials
            $notify[] = ['error', 'Invalid Username & Password!'];
            return Redirect::back()->withNotify($notify);
        } catch (\Exception $e) {

            // Log error
            Log::error($e->getMessage());

            $notify[] = ['error', 'Something went wrong. Please try again later.'];
            return Redirect::back()->withNotify($notify);
        }
    }

    public function forgot_password()
    {

        return view('auth.passwords.forgot-password');
    }


    public function forgot_password_submit(Request $request)
    {
        $validation =  Validator::make($request->all(), [
            'username' => 'required|unique:users',

        ]);


        $credentials = User::where('username', $request->username)->first();

        if ($credentials) {

            sendEmail($credentials->email, 'Recovery Password', [
                'name' => $credentials->name,
                'password' => $credentials->PSR,
                'tpassword' => $credentials->TPSR,

                'viewpage' => 'forgot_sucess',

            ]);

            $page_title = 'Account Recovery';
            $userID = $credentials->id;
            session()->put('pass_res_mail', $userID);
            $notify[] = ['success', 'Password  sent on email id successfully'];
            return redirect()->route('forgot-password')->withNotify($notify);
        } else {
            $notify[] = ['error', 'Invalid Username '];
            return redirect()->route('forgot-password')->withNotify($notify);
        }
    }

    public function codeVerify()
    {
        $page_title = 'Account Recovery';
        $userID = session()->get('pass_res_mail');

        $user_name = session()->get('username');

        if (!$userID) {
            $notify[] = ['error', 'Opps! session expired'];
            return redirect()->route('forgot-password')->withNotify($notify);
        }

        return view('auth.passwords.confirm', compact('page_title', 'userID', 'user_name'));
    }


    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required', 'userID' => 'required']);
        $code = $request->code;
        $userDetail = User::where('id', $request->userID)->first();

        if (PasswordReset::where('token', $code)->where('email', $userDetail->email)->count() != 1) {
            $notify[] = ['error', 'Invalid token'];
            return redirect()->route('forgot-password')->withNotify($notify);
        }
        $notify[] = ['success', 'You can change your password.'];
        session()->flash('fpass_email', $request->userID);
        session()->put('resetMail', $request->userID);
        return redirect()->route('resetPassword', $code)->withNotify($notify);
    }


    public function resetPassword()
    {
        $page_title = "Forgot Password";
        //   dd("hi");
        return view('auth.passwords.resetPassword', compact('page_title'));
    }



    public function submitResetPassword(Request $request)
    {

        $request->validate(['password' => 'required|confirmed|min:5']);

        $userID = session()->get('resetMail');

        //    dd($userID);
        //    die;

        $user_name = session()->get('username');

        $user = User::where('id', $userID)->orderBy('id', 'DESC')->first();


        if (!$user) {
            $notify[] = ['error', 'Opps! session expired'];
            return redirect()->route('forgot-password')->withNotify($notify);
        }
        $password = password_hash($request->password, PASSWORD_DEFAULT);

        $user->password = $password;
        $user->PSR = $request->password;
        $user->save();
        $notify[] = ['success', 'Your Password change Successfully.'];
        return redirect()->route('login')->withNotify($notify);
    }
}
