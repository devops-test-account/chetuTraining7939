<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiGateway;

class DashboardController extends Controller
{
    protected $apiUrl;
    protected $userUrl;

    public function __construct()
    {
        $this->apiUrl = env('TASK_MICROSERVICE_URL');
        $this->userUrl = env('USER_MICROSERVICE_URL');
    }

    public function index(){
        try {
            $result = ApiGateway::call('GET', $this->apiUrl . 'tasks/user/'.session('user')['id']);
            $assignedTasks = $result['data'];
            return view('user.dashboard',compact('assignedTasks'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
