<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Session;
use Illuminate\Support\Str;

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

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(23);
  
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            // 'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return 'We have e-mailed your password reset link!';

    }

    /**
       * Write code on Method
       *
       * @return response()
       */
    public function showResetPasswordForm($token) { 
        return view('auth.passwords.reset', ['token' => $token]);    
    }
 
    /**
     * Write code on Method
    *
    * @return response()
    */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')
                            ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                            ])
                            ->first();
        

        if(!$updatePassword){
            return back()->withErrors(['email' => 'Invalid token!']);
            // return back()->withInput()->withErrors('email', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        // Session::flash('message', "Special message goes here");
        // return Redirect::back();
        return redirect('/')->with('message', 'Your password has been changed!');
    }
}
