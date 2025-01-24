<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logoutUser()
    {
        try {
            //logged auth user object 
            $user = Auth::user();
            //This checks if a user is authenticated ($user is not null) and if the user has any tokens.
            if ($user && $user->tokens) {
                //all session across all devices will be deleted
                $user->tokens->each(function ($token) {
                    $token->delete();
                });
            }
            return response()->json([
                'message' => 'Successfully logged out from all devices.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while logging out.'
            ], 500);
        }
    }
}
