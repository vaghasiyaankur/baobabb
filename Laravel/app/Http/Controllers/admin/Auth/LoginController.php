<?php
namespace App\Http\Controllers\admin\Auth;

// use App\Helpers\Auth\Traits\AuthenticatesUsers;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Web\Auth\Traits\WebBasedLoginTrait;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) { 
            if(auth()->user())
            {
                if(auth()->user()->is_admin == 1)
                {
                    return redirect()->route('admin.dashboard')->withSuccess('You have Successfully loggedin');
                }
            }
            return $next($request);
        });

    }

	public function showLoginForm()
	{
		return view('admin.auth.login', ['title' => trans('admin.login')]);
	}
	
	/**
	 * @param \App\Http\Requests\LoginRequest $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function login(Request $request)
	{
		$request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
		// dd($credentials);
        if (Auth::attempt($credentials)) {
            if(auth()->user()->is_admin == 1)
            {
                return redirect()->route('admin.dashboard')->withSuccess('You have Successfully loggedin');
            }
            else
            {
                return redirect()->route('home');
            }
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
	}
	
	public function sendResetLinkEmail(Request $request)
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
