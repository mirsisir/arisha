<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo ='/de/customer_dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        return 'phone';
    }

    protected function authenticated(Request $request, $user)
    {

//        dd('bal');
        // to admin dashboard
        if($user->isAdmin()) {
            return redirect(route('dashboard'));
        }

        // to user dashboard
        else if($user->isCustomer()) {
            return redirect(route('page.homepage',['language'=>app()->getLocale()??'de'] ));
        }

        else if($user->isEmployee()) {
            return redirect(route('employee_dashboard'));
        }



        abort(404);
    }
}
