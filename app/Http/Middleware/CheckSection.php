<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $section)
    {
        if (auth()->check()) {
            $section = 'checkSection'. title_case($section);
            if ($request->user()->myOpras()->$section()) {
                return $next($request);
            } else {
                toastr('You are not allowed to perform this action', 'error');
                return back();
            }
        }
        return $next($request);
    }
}
