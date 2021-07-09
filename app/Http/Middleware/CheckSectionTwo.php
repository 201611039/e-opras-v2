<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSectionTwo
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
        if (auth()->check()) {
            if ($request->user()->myOpras()->checkSectionTwo()) {
                return $next($request);
            } else {
                toastr('You are not allowed to perform this action', 'error');
                return back();
            }
        }
        return $next($request);
    }
}
