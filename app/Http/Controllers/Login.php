<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Login extends Controller

{
    public function loginUser(LoginRequest $request)
    {
        $validatedData = $request->validated();
        if (Auth::attempt($validatedData)) {
            $user = User::where(["name" => $validatedData['name']])->first();
            $token = $user->createToken('AdvanceTodo')->accessToken;
            return response()->json(["message" => "Success", "data" => [
                'user' => $user,
                'access_token' => $token
            ]]);;
        }

        return response()->json(["message" => "Fail"]);
    }
}
