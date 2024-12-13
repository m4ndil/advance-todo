<?php

namespace App\Http\Controllers;

use App\Models\SignUp;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::create($validatedData);
        $user->save();
        return response()->json(["message" => "User Created", "data" => $user]);
    }

   
    public function show(User $signUp)
    {
        //
    }

}
