<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
protected $fillable=['user', 'task', 'description', 'start_date', 'priority', 'status'];
    function user(){
        return $this->belongsTo(User::class,'user','id');
    }

}
