<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class StoreUserLinks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::get('user-info-stored')) {

         
            // write all what you need to DB
    
            // set session flag to prevent DB duplicates
            Session::put('user-info-stored', true);
        }
        return $next($request);
    }
}