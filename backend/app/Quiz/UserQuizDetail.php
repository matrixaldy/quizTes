<?php

namespace App\Quiz;

use Illuminate\Database\Eloquent\Model;

class UserQuizDetail extends Model
{
    protected $fillable = [
        'user_id', 'max_time', 'start_time', 'end_time'
    ];
}
