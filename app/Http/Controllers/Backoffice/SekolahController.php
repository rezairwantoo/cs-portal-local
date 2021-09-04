<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthApi;
use Session;
use App\Http\Controllers\Api\SchoolApi;
use Illuminate\Support\Facades\Input;

class SekolahController extends Controller
{
    
    public function SekolahAdd(Request $request) {
        $resp = SchoolApi::DoAddSchool($request);
        if ($resp['status']) {
            return redirect('/bo-sekolah');
        }
        return redirect()->back()->withInput($request->all())->withErrors([$resp['messages']]);
    }

    public function SekolahGetList(Request $request) {
        $resp = SchoolApi::DoGetSchool($request);
        $data['data'] = $resp['data'];
        if ($resp['status']) {
            return $data;
        }
        return "";
    }

}
