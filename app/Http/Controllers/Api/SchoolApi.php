<?php 

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Firebase\JWT\JWT;
use Session;

class SchoolApi
{
    const ApiURL = "http://api.catatansekolah.net";
    const CreateSchoolPath = "/api/admin/schools";
    const GetSchoolPath = "/api/admin/schools";

    public static function DoAddSchool(Request $request) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        $session = Session::get('_tokusr');
        $url = $apiUrl.self::CreateSchoolPath;
        $response = Http::withToken($session)->post($url, [
            'name' => $request->input('name'),
            'npsn' => $request->input('npsn'),
            'school_level' => $request->input('school_level'),
            'school_type' => 1,
            'school_email' => $request->input('school_email'),
            'owner_email' => $request->input('owner_email'),
            'phone' => $request->input('phone'),
            'logo' => 'logo-path',
            'address' => $request->input('address'),
            'province' => 1,
            'city' => 1,
            'sub_district' => 1,
            'village' => 1,
        ]);
        
        if ($response->successful()) {
            return [
                "status" => true,
                "messages" => 'Berhasil Menambahkan Data Sekolah'
            ];
        } else {
            $respError = $response->json()['error'];
            return [
                "status" => false,
                "messages" => $respError['message']
            ];
        }
        
    }

    public static function DoGetSchool(Request $request) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        $session = Session::get('_tokusr');
        $url = $apiUrl.self::GetSchoolPath;
        $start = $request->input('start');
        $length = $request->input('length');
        $page = 1;
        if ($start != 0) {
            $page = ($start / $length) + 1;
        }
        // print_r($start);die;
        $response = Http::withToken($session)->get($url, [
            "limit"=>$length,
            "page"=>$page,
        ]);


        if ($response->successful()) {
            $dataResp = $response->json()['data']['data'];
            if (count($dataResp) > 0) {
                for ($i = 0; $i < count($dataResp); $i++) {
                    $dataResp[$i]['index'] = $i + 1;
                    $btnEdit = '<a href="#" class="btn btn-xs text-primary" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i></a>';
                    $dataResp[$i]['action'] = '<nobr>'.$btnEdit.'</nobr>';
                }
            }
            return [
                "status" => true,
                "messages" => 'Berhasil Menambahkan Data Sekolah',
                "data" => $dataResp,
                "total" =>$response->json()['data']['total'],
            ];
        } else {
            $respError = $response->json()['error'];
            return [
                "status" => false,
                "messages" => $respError['message'],
                "data" => [],
            ];
        }
        
    }
}