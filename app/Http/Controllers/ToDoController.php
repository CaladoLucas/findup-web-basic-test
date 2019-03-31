<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDos;
use Auth;

class ToDoController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $todos = ToDos::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('home',['todos' => $todos]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $todo = new ToDos();
        $todo->description = $request->description;
        $todo->user_id = Auth::id();
        $todo->save();

        return  redirect()->route('home');
    }

    public function destroy($id)
    {
        
        $todo = ToDos::find($id);

        $todo->delete();

        return  redirect()->route('home');
        
    }
}
