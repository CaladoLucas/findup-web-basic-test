<?php

use Illuminate\Http\Request;


Route::group(array('prefix' => 'api'), function(){
    route::get('/', function(){
        return response()->json(['message'=> 'ToDo API','status' => 'Connected']);
    });

    route::resource('todos','ToDoController');    
    route::resource('users','UserController');    
});

Route::get('/',function(){
    return redirect('api');
});