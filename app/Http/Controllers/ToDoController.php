<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDos;

class ToDoController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $todos = ToDos::with('users')->get();
        return response()->json($todos);
    }

    public function show($id){
        $todo = ToDos::with('users')->find($id);

        if(!$todo){
            return response()->json([
                'message' => 'Todo not found',
            ], 404);
        }

        return response()->json($todo);
    }

    public function store(Request $request)
    {
        $todo = new ToDos();
        $todo->fill($request->all());
        $todo->save();

        return response()->json($todo, 201);
    }

    public function update(Request $request, $id)
    {
        $todo = ToDos::find($id);

        if(!$todo) {
            return response()->json([
                'message'   => 'Todo not found',
            ], 404);
        }

        $todo->fill($request->all());
        $todo->save();

        return response()->json($todo);
    }

    public function destroy($id)
    {
        $todo = ToDos::find($id);

        if(!$todo) {
            return response()->json([
                'message'   => 'Todo not found',
            ], 404);
        }

        $todo->delete();
        
    }
}
