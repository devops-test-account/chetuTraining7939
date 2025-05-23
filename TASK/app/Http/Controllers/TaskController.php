<?php

namespace App\Http\Controllers;

use App\Models\Task; // Make sure to import the Task model
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    // Display a listing of tasks
    public function index(): JsonResponse
    {
        $tasks = Task::all(); // Fetch all tasks
        return response()->json($tasks); // Return tasks as JSON
    }

    // Store a newly created task in storage
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|integer', // Assuming assigned_to references a user
        ]);

        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'assigned_by' => auth()->user()->id,
        ]);

        return response()->json(['message' => 'Task created successfully.', 'task' => $task], 201);
    }

    // Get a task by ID
    public function getById($id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }

        return response()->json($task); // Return task data as JSON
    }
    public function userTasks($id): JsonResponse
    {
        $task = Task::where('assigned_to', $id)->count();

        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }

        return response()->json(['taskCount'=>$task]); // Return task data as JSON
    }

    // Update the specified task in storage
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|integer',
        ]);

        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }

        $task->name = $request->name;
        $task->description = $request->description;
        $task->assigned_to = $request->assigned_to;
        $task->assigned_by = auth()->user()->id;

        $task->save(); // Save the updated task

        return response()->json(['message' => 'Task updated successfully.', 'task' => $task]);
    }

    // Assign a task to a user
    public function assign(Request $request, $id): JsonResponse
    {
        $request->validate([
            'assigned_to' => 'required|integer', // Assuming assigned_to references a user
        ]);

        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }

        $task->assigned_to = $request->assigned_to; // Update the assigned_to field
        $task->save(); // Save the updated task

        return response()->json(['message' => 'Task assigned successfully.', 'task' => $task]);
    }

    // Remove the specified task from storage
    public function destroy($id): JsonResponse
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found.'], 404);
        }

        $task->delete(); // Delete the task

        return response()->json(['message' => 'Task deleted successfully.']);
    }
}
