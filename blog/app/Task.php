<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public static function scopeIncomplete($query) //Task::incomplete()
    {
    	return $query->where('completed',0);
    }
}
