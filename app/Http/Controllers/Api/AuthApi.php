<?php 

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Firebase\JWT\JWT;
use Session;

class AuthApi
{

    const ApiURL = "http://api.catatansekolah.net";
    const LoginPath = "/api/login";
    const LoginNewUserPath = "/api/new-user/login";
    const MePath = "/api/me";

    public static function DoLogin(Request $request) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        
        $url = $apiUrl.self::LoginPath;
        $response = Http::post($url, [
            'username' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        $respData = $response->json();
       
        if ($response->successful()) {
            $token = $respData['data']['token'];
            $url = $apiUrl.self::MePath;
            $response = Http::withToken($token)->get($url, [
                'username' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            if ($response->successful()) {
                Session::put('_tousr', $response->body());
                Session::put('_tokusr', $token);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        
    }

    public static function DoLoginUserNew(Request $request) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        
        $url = $apiUrl.self::LoginNewUserPath;
        $response = Http::post($url, [
            'username' => $request->input('email'),
        ]);
        if ($response->successful()) {
            return [
                "status" => true,
                "messages" => 'Berhasil Memverifikasi Data Pengguna',
                "data" => $response->json()['data'],
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