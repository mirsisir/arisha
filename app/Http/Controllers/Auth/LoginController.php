<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'New_Order';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {


        // to admin dashboard
        if($user->isAdmin()) {
            return redirect(route('dashboard'));
        }

        // to user dashboard
        else if($user->isCustomer()) {
            return redirect(route('page.homepage',['language'=>app()->getLocale()??'de'] ));
        }

        else if($user->isEmployee()) {
            return redirect(route('services_request_list'));
        }



        abort(404);
    }
}
