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

        if (!Auth::user()->hasRole('Admin'))  //Simple user no access to admin
        {
            return \redirect(route('index'));
        }

        if (!Auth::user()->hasRole('Owner'))  //Simple user no access to admin
        {
            return \redirect(route('index'));
        }

        if (!Auth::user()->hasRole('Editor'))  //Simple user no access to admin
        {
            return \redirect(route('index'));
        }

        if (!Auth::user()->hasRole('Viewer'))  //Simple user no access to admin
        {
            return \redirect(route('index'));
        }

        //Product
        if ($request->is('admin/product/view'))//If user is creating a product
        {
            if (!Auth::user()->hasPermissionTo('Product-Create')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/product/update/save')) //If user is editing a product
        {
            if (!Auth::user()->hasPermissionTo('Product-Edit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/product/delete/*')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Product-Delete')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        // Category
        if ($request->is('admin/category/add')) //If user is creating a category
        {
            if (!Auth::user()->hasPermissionTo('Categories-Create')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/category/update/save')) //If user is editing a category
        {
            if (!Auth::user()->hasPermissionTo('Categories-Edit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/category/delete/*')) //If user is deleting a category
        {
            if (!Auth::user()->hasPermissionTo('Categories-Delete')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        // Sliders
        if ($request->is('admin/sliders/add')) //If user is creating a sliders
        {
            if (!Auth::user()->hasPermissionTo('Sliders-Create')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/sliders/update/save')) //If user is editing a sliders
        {
            if (!Auth::user()->hasPermissionTo('Sliders-Edit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/sliders/delete/*')) //If user is deleting a sliders
        {
            if (!Auth::user()->hasPermissionTo('Sliders-Delete')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        // Orders
        if ($request->is('admin/order/delivery-update/save')) //If user is editing a order delivery
        {
            if (!Auth::user()->hasPermissionTo('Orders-Edit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/order/delete/*')) //If user is deleting a order
        {
            if (!Auth::user()->hasPermissionTo('Orders-Delete')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}
