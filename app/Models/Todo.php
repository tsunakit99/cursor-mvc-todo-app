<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'completed'];

    public function getCompletedAttribute($value)
    {
        return $value ? true : false;
    }

    public function setCompletedAttribute($value)
    {
        $this->attributes['completed'] = $value ? true : false;
    }
    

    
    
}
