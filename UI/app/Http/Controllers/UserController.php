<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiGateway;

class UserController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('USER_MICROSERVICE_URL');
    }

    public function index()
    {
        try {
            // $payload = $request->only('email', 'password');
            // dd($payload);
            $userServiceUrl = $this->apiUrl . 'users';
            // dd($userServiceUrl);
            $result = ApiGateway::call('GET', $userServiceUrl);
            // dd($result); 

            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            $data = $result['data'];
            return view('user.users.index', compact('data'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function create()
    {
        try {
            return view('user.users.create');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $payload = $request->only('name', 'email', 'password');
            $userServiceUrl = $this->apiUrl . 'register';
            // dd($userServiceUrl);
            $result = ApiGateway::call('POST', $userServiceUrl, $payload);
            dd($result);

            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            return redirect(route('users.index'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function getByID()
    {
        try {
            // $payload = $request->only('email', 'password');
            // dd($payload);
            $userServiceUrl = $this->apiUrl . 'users';
            // dd($userServiceUrl);
            $result = ApiGateway::call('GET', $userServiceUrl);
            // dd($result);

            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            $data = $result['data'];
            return view('user.users.index', compact('data'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function update()
    {
        try {
            // $payload = $request->only('email', 'password');
            // dd($payload);
            $userServiceUrl = $this->apiUrl . 'users';
            // dd($userServiceUrl);
            $result = ApiGateway::call('GET', $userServiceUrl);
            // dd($result);

            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            $data = $result['data'];
            return view('user.users.index', compact('data'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy()
    {
        try {
            // $payload = $request->only('email', 'password');
            // dd($payload);
            $userServiceUrl = $this->apiUrl . 'users';
            // dd($userServiceUrl);
            $result = ApiGateway::call('GET', $userServiceUrl);
            // dd($result);

            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            $data = $result['data'];
            return view('user.users.index', compact('data'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
