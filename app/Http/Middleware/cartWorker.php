<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\Auth;

class cartWorker
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

        $response = $next($request);

        //If the status is not approved redirect to login


        if (isset($_POST['email'])) {

            $user = User::query()->where('email', $_POST['email'])->get();
            $userName = $user[0];
        }

        return $response;

    }

}
