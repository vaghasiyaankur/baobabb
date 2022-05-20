<?php
   
namespace App\Http\Controllers;
   
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use Hash;
   
class SocialiteController extends Controller
{

    // google
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('social_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
    
            return redirect('/');
    
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                // 'social_type'=> 'google',
                // 'password' => Hash::make('my-google')
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }

    // Facebook
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
           
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $finduser = User::where('facebook_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
            return redirect('/');
        }else{
            $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'facebook_id'=> $user->id,
                ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
}