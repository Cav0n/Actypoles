<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use \Illuminate\Http\Request;

class IsAdmin
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
        if (! \App\Admin::check($request)) {
            return redirect(route('admin.login'));
        }

        return $next($request);
    }
}
