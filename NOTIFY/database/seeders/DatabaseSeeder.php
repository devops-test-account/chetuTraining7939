<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification as Notify;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Notify::create([
            'name' => 'Send Task Assignment Notification',
            'slug' => 'taskAssignment',
            'subject' => '@@TASK@@ Has Been Assigned to You',
            'content' => '
                <html lang="en">
                    <head>
                    <meta charset="UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <title>Task Assigned Notification</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin:0; padding:0; color: #333;">
                    <div style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px;">
                        <div style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px; margin-bottom: 20px;">
                        <h1 style="color: #4CAF50; margin: 0; font-size: 24px;">New Task Assigned</h1>
                        </div>
                        <div style="font-size: 16px; line-height: 1.6;">
                        <p>Dear @@NAME@@,</p>
                        <p>You have been assigned a new task within the system. Please find the task details below:</p>
                        <ul style="padding-left: 20px;">
                            <li><span style="color: #4CAF50; font-weight: bold;">Task Title:</span> @@TASKTITLE@@</li>
                            <li><span style="color: #4CAF50; font-weight: bold;">Description:</span> @@TASKDESCRIPTION@@</li>
                            <li><span style="color: #4CAF50; font-weight: bold;">Due Date:</span> @@DUEDATE@@</li>
                            <li><span style="color: #4CAF50; font-weight: bold;">Priority:</span> @@PRIORITY@@</li>
                        </ul>
                        <p>Please make sure to review the task and start working on it promptly.</p>
                        <p>You can view the task details and update its status by clicking the button below:</p>
                        <p>
                            <a href="@@TASKLINK@@" target="_blank" rel="noopener noreferrer" style="display: inline-block; padding: 12px 20px; margin-top: 20px; background-color: #4CAF50; color: #fff !important; text-decoration: none; font-weight: bold; border-radius: 5px;">
                            View Task
                            </a>
                        </p>
                        <p>Thanks &amp; Regards,<br />
                        @@CompanyName@@ Team</p>
                        </div>
                        <div style="margin-top: 30px; font-size: 14px; color: #777777; border-top: 1px solid #dddddd; padding-top: 10px;">
                        <p>If you have any questions or need assistance, please contact support at <a href="mailto:support@example.com">support@example.com</a>.</p>
                        </div>
                    </div>
                    </body>
                </html>
            ',
        ]);
        Notify::create([
            'name' => 'Send Task Re-Assignment Notification',
            'slug' => 'taskReAssigend',
            'subject' => '@@TASK@@ Has Been Re-Assigned',
            'content' => '
                <html lang="en">
                    <head>
                    <meta charset="UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <title>Task Assigned Notification</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin:0; padding:0; color: #333;">
                    <div style="max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px;">
                        <div style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px; margin-bottom: 20px;">
                        <h1 style="color: #4CAF50; margin: 0; font-size: 24px;">New Task Assigned</h1>
                        </div>
                        <div style="font-size: 16px; line-height: 1.6;">
                        <p>Dear @@NAME@@,</p>
                        <p>The Task <span style="color: #4CAF50; font-weight: bold;">@@TASKTITLE@@</span> has been reassigned to someone else from you.</p>
                        <p>Thanks &amp; Regards,<br />
                        @@CompanyName@@ Team</p>
                        </div>
                        <div style="margin-top: 30px; font-size: 14px; color: #777777; border-top: 1px solid #dddddd; padding-top: 10px;">
                        <p>If you have any questions or need assistance, please contact support at <a href="mailto:support@example.com">support@example.com</a>.</p>
                        </div>
                    </div>
                    </body>
                </html>
            ',
        ]);
    }
}
