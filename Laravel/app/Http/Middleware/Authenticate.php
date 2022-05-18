<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;
use App\Models\User;
class Authenticate extends  Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $user = User::find(auth()->user()->id);
            if($user->type == 'admin')
            {
                // return redirect()->route('admin.dashboard');
            }
            return $next($request);
        }
        // dd(0);
        return redirect()->route('home');
    }

}