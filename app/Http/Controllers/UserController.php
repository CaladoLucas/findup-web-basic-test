<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Controllers\ApiTokenController;

class UserController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $users = User::with('todos')->get();
        return response()->json($users);
    }

    public function show($id){
        $user = User::with('todos')->find($id);

        if(!$user){
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message'   => 'User not found',
            ], 404);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message'   => 'User not found',
            ], 404);
        }

        $user->delete();
        
    }
    public function createSession(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user) {
            return response()->json([
                'message'   => 'User not found',
            ], 404);
        }

        $token = new ApiTokenController;        
        return redirect()->route('objetivocentral.index');
    }

}
