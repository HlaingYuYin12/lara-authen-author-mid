<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 'user'){
            return $next($request);  // သွားခွင့်ရမရ
        }

        abort(404); //errorတက် (read  status code)
        // dd('you are not user account .Change admin role!!');



    }
}
