<?php

namespace App\Quiz;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    protected $fillable = [
        'choice_id', 'question_id', 'user_id'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function question() {
        return $this->hasOne('App\Quiz\Question', 'id', 'question_id');
    }

    public function choice() {
        return $this->hasOne('App\Quiz\QuestionAnswerChoice', 'id', 'choice_id');
    }
}
