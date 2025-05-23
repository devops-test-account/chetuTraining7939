<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiGateway;

class TaskController extends Controller
{
    protected $apiUrl;
    protected $userUrl;
    protected $notifyUrl;

    public function __construct()
    {
        $this->apiUrl = env('TASK_MICROSERVICE_URL');
        $this->userUrl = env('USER_MICROSERVICE_URL');
        $this->notifyUrl = env('NOTIFY_MICROSERVICE_URL');
    }

    public function index()
    {
        try {
            $result = ApiGateway::call('GET', $this->apiUrl . 'tasks');
            $userResult = ApiGateway::call('GET', $this->userUrl . 'users');
            
            $data = $result['data'];
            
            $data = $result['data'];
            $users = $userResult['data'];
            return view('user.tasks.index', compact('data', 'users'));
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function create()
    {
        try {
            $userResult = ApiGateway::call('GET', $this->userUrl . 'users');
            $users = $userResult['data'];

            return view('user.tasks.create', compact('users'));
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function store(Request $request)
    {
        try {
            $payload = $request->only('name', 'description', 'assigned_to');
            $result = ApiGateway::call('POST', $this->apiUrl . 'tasks', $payload);

            if (isset($result['data']['task'])) {
                $task = $result['data']['task'];
                $userResult = ApiGateway::call('GET', $this->userUrl . 'users/'.$task['assigned_to']);
                if(isset($userResult['data']['name'])){
                    $notifyPayload = [
                        "user_name"=>$userResult['data']['name'],
                        "user_email"=>$userResult['data']['email'],
                        "task_id"=>$task['id'],
                        "task_name"=>$task['name'],
                        "task_description"=>$task['description']
                    ];
                    $notifyResult = ApiGateway::call('POST', $this->notifyUrl . 'notify/assigned', $notifyPayload);
                }
            }
            return redirect(route('tasks.index'));
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function getByID($id)
    {
        try {
            // $payload = $request->only('email', 'password');
            // dd($payload);
            $result = ApiGateway::call('GET', $this->apiUrl . 'tasks/' . $id);

            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            $data = $result['data'];
            $userResult = ApiGateway::call('GET', $this->userUrl . 'users');
            $users = $userResult['data'];
            return view('user.tasks.edit', compact('data', 'users'));
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $payload = $request->only('name', 'description', 'assigned_to');
            // dd($payload);
            $result = ApiGateway::call('PUT', $this->apiUrl . 'tasks/' . $id, $payload);
            if (isset($result['data']['task'])) {
                $task = $result['data']['task'];
                $userResult = ApiGateway::call('GET', $this->userUrl . 'users/'.$task['assigned_to']);
                if(isset($userResult['data']['name'])){
                    $notifyPayload = [
                        "user_name"=>$userResult['data']['name'],
                        "user_email"=>$userResult['data']['email'],
                        "task_id"=>$task['id'],
                        "task_name"=>$task['name'],
                        "task_description"=>$task['description']
                    ];
                    $notifyResult = ApiGateway::call('POST', $this->notifyUrl . 'notify/assigned', $notifyPayload);
                }
            }
            return redirect(route('tasks.index'));
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            // $payload = $request->only('email', 'password');
            // dd($payload);
            $result = ApiGateway::call('DELETE', $this->apiUrl . 'tasks/' . $id);
            
            // if ($result['data']['success']) {
            //     $data = $result['data']['data']['token'];
            // }
            return redirect(route('tasks.index'));
        } catch (\Throwable $th) {
            return back();
        }
    }
}
