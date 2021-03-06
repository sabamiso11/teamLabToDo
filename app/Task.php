<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_name', 'limit'];

    //protected $touches = ['tasklist'];


    public function tasklist(){
        return $this->belongsTo('App\TaskList');
    }
}
