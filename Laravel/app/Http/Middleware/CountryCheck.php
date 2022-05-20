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
        // dd($this->getIp());
        $ip = '2405:201:200c:b83f:1495:de75:fa9b:6b92';
        // $ip = $this->getIp();
        if($position = Location::get($ip)) {
            setcookie('country', $position->countryName, time() + (10 * 365 * 24 * 60 * 60));
        }
        return $next($request);
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
}
