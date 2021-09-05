<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApi;
use Session;
use App\Http\Controllers\Api\SchoolApi;
use App\Http\Controllers\Api\UserApi;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    
    public function UserAdd(Request $request) {
        $request->input('start', 0);
        $request->input('length', 1000);
        $resp = SchoolApi::DoGetSchool($request);
        return view('bo.useradd', ['dataSekolah' => $resp['data']]);
    }

    public function UserAddPost(Request $request) {
        $resp = UserApi::DoAddUserFromBO($request);
        if ($resp['status']) {
            return redirect('/bo-user');
        }
        return redirect()->back()->withInput($request->all())->withErrors([$resp['messages']]);
    }

    public function UserSetNewPassword(Request $request) {
        $resp = UserApi::DoSetNewPassword($request, $request->input('dpen'));
        if ($resp['status']) {
            return redirect('/home');
        }
        return redirect('/login')->withErrors([$resp['messages']]);
    }

}


