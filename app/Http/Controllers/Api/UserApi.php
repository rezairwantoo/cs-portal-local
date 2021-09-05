<?php 

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Firebase\JWT\JWT;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Api\AuthApi;

class UserApi
{
    const ApiURL = "http://api.catatansekolah.net";
    const CreateOperatorUser = "/api/admin/users/create-operator";
    const CreateTeacherUser = "/api/admin/users/create-teacher";
    const UpdatePassNewUser = "/api/new-user/update-password";

    public static function DoAddUserFromBO(Request $request) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        $session = Session::get('_tokusr');
        $url = $apiUrl.self::CreateTeacherUser;
        if ($request->input('operator')) {
            $url = $apiUrl.self::CreateOperatorUser;
        }
        

        $postData = [
            "username" => $request->input('username'),
            "email" => $request->input('email'),
            "school_id" => $request->input('school_id')
        ];

        $response = Http::withToken($session)->post($url, $postData);
        if ($response->successful()) {
            return [
                "status" => true,
                "messages" => 'Berhasil Menambahkan Data Pengguna'
            ];
        } else {
            $respError = $response->json()['error'];
            return [
                "status" => false,
                "messages" => $respError['message']
            ];
        }
        
    }

    public static function DoSetNewPassword(Request $request, $id) {
        $apiUrl = env('APP_API_URL', self::ApiURL);
        $url = $apiUrl.self::UpdatePassNewUser."/".$id;
        
        
        $response = Http::put($url, [
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
        ]);
        
        if ($response->successful()) {
            $token = $response->json()['data']['token'];
            $url = $apiUrl.AuthApi::MePath;
            $response = Http::withToken($token)->get($url, []);

            if ($response->successful()) {
                Session::put('_tousr', $response->body());
                Session::put('_tokusr', $token);
                return [
                    "status" => true,
                    "messages" => "Login Berhasil"
                ];
            } else {
                $respError = $response->json()['error'];
                return [
                    "status" => false,
                    "messages" => $respError['message']
                ];
            }
        } else {
            $respError = $response->json()['error'];
            return [
                "status" => false,
                "messages" => $respError['message']
            ];
        }
        
    }
}