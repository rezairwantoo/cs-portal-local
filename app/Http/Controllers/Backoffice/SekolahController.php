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
        // print_r($request->all());die;
        // $data['data'] = $resp['data'];
        $data = array(
            "draw" => $request->input('draw'),
            "recordsTotal" => count($resp['data']),
            "recordsFiltered" => $resp['total'],
            "data" => $resp['data']
        );
        // $data['totalData'] = count($resp['data']);
        if ($resp['status']) {
            return $data;
        }
        return "";
    }

}
