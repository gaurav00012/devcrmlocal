<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
         if(auth()->user()->user_role == 4)
        {
          return $next($request);    
        }
        return redirect('home')->with('error',"Oops Something went wrong.");
        //return $next($request);
    }
}
