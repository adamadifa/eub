<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['questionnaire_template_id', 'content', 'group', 'type', 'order'];

    public function template()
    {
        return $this->belongsTo(QuestionnaireTemplate::class, 'questionnaire_template_id');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
