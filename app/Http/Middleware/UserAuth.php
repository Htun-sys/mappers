<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        //can add register path 
        if ($request->path()=="login" && $request->session()->has("user")) {
            return redirect("/crud");
        }

        //no auth user prevent access
        if(($request->is("add") || 
            $request->is("delete/*") 
            || $request->is("edit/*") 
            || $request->is("update")
            || $request->is("crud"))
            && 
            !$request->session()->has("user")) {
            return redirect("/login");
        }
        return $next($request);
    }
}
