<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated​
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

        if( Auth::check() )
        {
            // if user is not admin take him to his dashboard
            if ( Auth::user()->isCustomer() ) {
                return redirect(route('page.homepage',['language'=>app()->getLocale()??'de']));
            }

            // allow admin to proceed with request
            else if ( Auth::user()->isAdmin() ) {
                return $next($request);

            }
            else if ( Auth::user()->isEmployee() ) {
                return redirect(route('services_request_list'));
            }


        }

        abort(404);  // for other user throw 404 error
    }

}
