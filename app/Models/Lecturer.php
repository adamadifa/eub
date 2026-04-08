<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = ['user_id', 'nidn', 'title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class);
    }
}
