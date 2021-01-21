<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAuthenticated
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
                return redirect(route('dashboard'));

            }
            else if ( Auth::user()->isEmployee() ) {
                return $next($request);

            }


        }
    }
}
