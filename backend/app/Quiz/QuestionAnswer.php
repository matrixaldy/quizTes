<?php

namespace App\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable = [
        'question_id', 'choice_id'
    ];

    public function choice() {
        return $this->hasOne('App\Quiz\QuestionAnswerChoice', 'id', 'choice_id');
    }
}
