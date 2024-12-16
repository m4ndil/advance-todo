<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;
use App\Models\SignUp;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function store(UserDetailRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        $user->save();
        return response()->json(["message" => "User Created", "data" => $user]);
    }


    public function show(User $signUp)
    {
        //
    }
}
