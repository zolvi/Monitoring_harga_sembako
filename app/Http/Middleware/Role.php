<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Role
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
       
      if(Auth::check() && Auth::user()->role()){

      return $next($request);  
      }
      
       return redirect('/');
        
    }
}
