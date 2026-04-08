<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['user_id', 'course_class_id', 'question_id', 'value', 'comments'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
