<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFieldRequest;
use App\Models\Todo;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todoLists = Todo::all();
        return response()->json($todoLists);
    }


    public function create()
    {
        //
    }

    //custom validation
    public function store(TodoFieldRequest $request)
    {
        $validatedData = $request->validated();
        //create saves automatically
        $newTodo = Todo::create($validatedData);
        return response()->json(
            [
                "message" => "Data has been inserted.",
                "data" => $newTodo
            ]
        );
    }


    public function show(Todo $todo)
    {
        return response()->json($todo);
    }


    public function edit(Todo $todo)
    {
        //
    }


    public function update(TodoFieldRequest $request, Todo $todo)
    {
        $validatedData = $request->validated();
        $todo->update($validatedData);
        return response()->json(["message" => "Data has been updated.", "data" => $todo]);
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(["message" => 'Deleted']);
    }
}
