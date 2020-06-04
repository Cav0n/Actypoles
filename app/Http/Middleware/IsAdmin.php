<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;

class IsAdmin
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
            return redirect(route('admin.login'));
        }

        $admin = $request->session()->get('admin');

        if (! Admin::where('id', $admin->id)->where('sessionToken', $admin->sessionToken)->exists()) {
            return redirect(route('admin.login'));
        }

        return $next($request);
    }
}
