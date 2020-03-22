<?php

namespace App\Http\Middleware;

use Closure;

class isClient
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
       // dd(auth()->user());
         if(auth()->user()->user_role == 3)
        {
          return $next($request);    
        }
        return redirect('home')->with('error',"You don't have admin access.");
        //return $next($request);
    }
}
