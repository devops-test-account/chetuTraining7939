<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiGateway;

class AuthController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('USER_MICROSERVICE_URL');
    }

    public function index()
    {
        try {
            return view('auth.login');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function login(Request $request)
    {
        try {
            $payload = $request->only('email', 'password');
            // dd($payload);
            $userServiceUrl = $this->apiUrl . 'login';

            $result = ApiGateway::call('POST', $userServiceUrl, $payload);
            if ($result['data']['success']) {
                session(['auth_token' => $result['data']['data']['token']]);
                session(['user' => $result['data']['data']['user']]);
            }

            // return redirect(route('user.dashboard'));
            return redirect(route('user.dashboard'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
