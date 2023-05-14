<?php

namespace App\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswerChoice extends Model
{
    protected $fillable = [
        'question_id', 'detail'
    ];
}
