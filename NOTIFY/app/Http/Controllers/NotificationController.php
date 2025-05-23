<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function sendTaskAssignmentNotification(Request $request){
        try {
            if(isset($request->user_email) && $request->user_email !== ''){
                if($this->sendMail($request->all() , 'taskAssignment')){
                    return response()->json(['message' => 'Email Sent Successfully'], 200);
                }
                return response()->json(['message' => 'Something Went Wrong'], 500);
            }
            return response()->json(['message' => 'Email Not Found'], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something Went Wrong'], 500);
        }
    }
    public function sendTaskReAssignmentNotification(Request $request){
        try {
            if(isset($request->user_email) && $request->user_email !== ''){
                if($this->sendMail($request->all() , 'taskReAssigend')){
                    return response()->json(['message' => 'Email Sent Successfully'], 200);
                }
                return response()->json(['message' => 'Something Went Wrong'], 500);
            }
            return response()->json(['message' => 'Email Not Found'], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something Went Wrong'], 500);
        }
    }

    private function sendMail($data,$template){
        try {
            $notificationTemplate = Notification::where('slug',$template)->first();

            $subject = str_replace('@@TASKTITLE@@', $data['task_name'],$notificationTemplate->subject);
            if($template === 'taskAssignment'){
                $htmlTemplate = str_replace('@@TASKLINK@@', env('UI_MICROSERVICE_URL').$data['task_id'], str_replace('@@TASKDESCRIPTION@@', $data['task_description'], str_replace('@@TASKTITLE@@', $data['task_name'], str_replace('@@NAME@@', $data['user_name'], $notificationTemplate->content))));
            }else{
                $htmlTemplate = str_replace('@@TASKTITLE@@', $data['task_name'], str_replace('@@NAME@@', $data['user_name'], $notificationTemplate->content));
            }
            $email = $data['user_email'];
            Mail::send([], [], function ($message) use ($email, $subject, $htmlTemplate) {
                $message->to($email)
                        ->subject($subject)
                        ->html($htmlTemplate); // HTML Body
            });
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
