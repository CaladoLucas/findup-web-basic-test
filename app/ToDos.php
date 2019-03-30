<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDos extends Model
{
    use SoftDeletes;

    protected $table = 'todos';

    protected $fillable = ['description','user_id'];

    protected $dates = ['deleted_at'];

    function users(){
        return $this->belongsTo('App\User','id');
    }
}
