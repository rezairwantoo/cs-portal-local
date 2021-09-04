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
}