<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Method to get user information
    public function getUserInfo(Request $request)
    {
        // Retrieve the authenticated user information
        $user = $request->user();

        // Return the user information as JSON
        return response()->json($user);
    }
    
    // Method to get user details by ID
    public function getUserById($userId)
    {
        // Retrieve the user by ID
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Return the user details as JSON
        return response()->json($user);
    }
}
