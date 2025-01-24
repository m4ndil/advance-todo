<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller

{
    public function loginUser(LoginRequest $request)
{
    try {
        $validatedData = $request->validated();
        
        // Attempt user authentication
        if (Auth::attempt($validatedData)) {
            // Find the user by their name (you might want to consider using email or a unique field)
            $user = User::where(["name" => $validatedData['name']])->first();

            // If the user is not found
            if (!$user) {
                return response()->json(["message" => "User not found"], 404);
            }

            // Generate the token for the user
            $token = $user->createToken('nccs')->accessToken;
            
            return response()->json([
                "message" => "Success",
                "data" => [
                    'user' => $user,
                    'access_token' => $token
                ]
            ]);
        }
        
        return response()->json(["message" => "Invalid credentials"], 401);
    } catch (\Exception $e) {
        // Log the exception for debugging purposes (optional)
        \Log::error('Login attempt failed: ' . $e->getMessage());
        
        // Return a generic error response
        return response()->json(["message" => "An error occurred, please try again later."], 500);
    }
}

}
