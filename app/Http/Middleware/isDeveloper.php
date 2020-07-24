<?php

namespace App\Http\Middleware;

use Closure;

class isDeveloper
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
         if(auth()->user()->user_role == 2)
        {
          return $next($request);    
        }
        if(auth()->user()->user_role == 3)
        {
            return redirect('/'.auth()->user()->slug);
        }
        return redirect('home')->with('error',"You don't have admin access.");
        //return $next($request);
    }
}
