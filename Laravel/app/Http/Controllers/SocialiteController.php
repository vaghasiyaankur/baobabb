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

    // -------------------------------------google------------------------------------------//
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
    
            return redirect('/');
    
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
            ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }

    // ---------------------------------------Facebook------------------------------------//
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
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

    // ---------------------------------------Linkedin------------------------------------//
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function handleCallbackLinkedin()
    {
        $user = Socialite::driver('linkedin')->user();
        $finduser = User::where('linkedin_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
            return redirect('/');
        }else{
            $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'linkedin_id'=> $user->id,
                ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }

    // ---------------------------------------Twitter------------------------------------//
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function handleCallbackTwitter()
    {
        $user = Socialite::driver('twitter')->user();
        $finduser = User::where('twitter_id', $user->id)->first();
        if($finduser){
            Auth::login($finduser);
            return redirect('/');
        }else{
            $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'twitter_id'=> $user->id,
                ]);
            Auth::login($newUser);
            return redirect('/');
        }
    }
    
}