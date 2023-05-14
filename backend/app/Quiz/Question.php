<?php

namespace App\Quiz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'score'
    ];

    public function choices() {
        return $this->hasMany('App\Quiz\QuestionAnswerChoice', 'question_id');
    }

    public function answer() {
        return $this->belongsTo('App\Quiz\QuestionAnswer', 'id', 'question_id');
    }
}
