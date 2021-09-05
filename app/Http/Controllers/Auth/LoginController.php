<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApi;
use Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginPortal(Request $request) {
        // print_r($request->all());die;
        $loginStat = AuthApi::DoLogin($request);
        if ($loginStat) {
            return redirect('/home');
        }

        $loginStat = AuthApi::DoLoginUserNew($request);
        if ($loginStat['status']) {
            return view('auth.updatepassnewuser', ['datapengguna' => $loginStat['data']]);

        }
        return redirect()->back()->withInput($request->all())->withErrors([$loginStat['messages']]);
    }

    public function showLoginForm(Request $request) {
        $session = Session::get('_tousr');
        if (isset($session)) {
            return redirect('/home');
        }
        
        return view('auth.login');
    }

    public function logoutPortal(Request $request) {
        Session::flush();
        return redirect('/login');
    }
}
