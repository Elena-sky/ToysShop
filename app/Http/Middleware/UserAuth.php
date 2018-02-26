<?php

namespace App\Http\Middleware;

use Closure;
use \Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\View;


class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        View::share('user', $user);

        return $next($request);
    }
}
