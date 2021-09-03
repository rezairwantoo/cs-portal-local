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
    const MePath = "/api/me";

    public static function DoLogin(Request $request) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        
        $url = $apiUrl.self::LoginPath;
        $response = Http::post($url, [
            'username' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        
        // $client = new \GuzzleHttp\Client();
        // $response = $client->post(
        //     $url,[
        //         'form_params' => [
        //             'username' => $request->input('email'),
        //             'password' => $request->input('password'),
        //         ]
        //     ]
        // );

        $respData = $response->json();
        $token = $respData['data']['token'];
        if ($response->successful()) {
            $url = $apiUrl.self::MePath;
            $response = Http::withToken($token)->get($url, [
                'username' => $request->input('email'),
                'password' => $request->input('password'),
            ]);

            if ($response->successful()) {
                Session::put('_tousr', $response->body());
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        
    }
}