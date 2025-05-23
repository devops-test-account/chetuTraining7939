<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    // Display a listing of users
    public function index(): JsonResponse
    {
        $users = User::all()->groupBy('id'); // Fetch all users
        return response()->json($users); // Return users as JSON
    }

    // Show the form for editing the specified user
    public function getById($id): JsonResponse
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        return response()->json($user); // Return user data as JSON
    }
}
