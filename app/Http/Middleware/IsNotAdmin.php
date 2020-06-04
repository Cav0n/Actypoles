<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;

class IsNotAdmin
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
        if (! $request->session()->has('admin')) {
            return $next($request);
        }

        $admin = $request->session()->get('admin');

        if (! Admin::where('id', $admin->id)->where('sessionToken', $admin->sessionToken)->exists()) {
            return $next($request);
        }

        return redirect(route('admin.homepage'));
    }
}
