<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function loginUser(Request $request)
    {
        $validatedData = $request->validate(
            [
                "name" => "required",
                "password" => "required|min:8"
            ]
        );
        // $input= User::where(["name" => $validatedData['name'], "password" => $validatedData['password']])->first();
        if (Auth::attempt($validatedData)) {
            //TODO::AccessToken
            return response()->json(["message" => "Success", "data" => $validatedData]);;
        }

        return response()->json(["message" => "Fail"]);
    }
}
