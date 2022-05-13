<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Cookie;


class CountryCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(123);
        if($position = Location::get('2405:201:200c:b83f:1495:de75:fa9b:6b92')) {
            setcookie('country', $position->countryName, time() + (10 * 365 * 24 * 60 * 60));
            // dd('fdfdf');
        } else {
            // dd(123);
            // Failed retrieving position.
        }
        return $next($request);
    }
}
