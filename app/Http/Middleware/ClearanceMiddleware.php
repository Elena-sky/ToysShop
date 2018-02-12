<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware
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
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
        {
            return $next($request);
        }

        if (Auth::user()->hasRole('User')) {
            return \redirect(route('index'));

        }

        if ($request->is('admin' || ''))//If user is creating a product
        {
            if (!Auth::user()->hasPermissionTo('Product-Create')) {
                return \redirect(route('index'));
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin'))//If user is creating a product
        {
            if (!Auth::user()->hasPermissionTo('Product-Create')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('posts/*/edit')) //If user is editing a product
        {
            if (!Auth::user()->hasPermissionTo('Product-Edit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Product-Delete')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
