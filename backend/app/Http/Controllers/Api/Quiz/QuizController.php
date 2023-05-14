<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Setting;
use App\Quiz\Question;
use App\Quiz\UserQuizDetail;
use App\Quiz\UserQuestionAnswer;

use Auth;

class QuizController extends Controller
{
    public function quiz()
    {
        $setting = Setting::find(1);
        $questions = Question::with('answer', 'answer.choice')->get();
        $max_score = Question::sum('score');
        $detail = UserQuizDetail::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        $answerTrueScore = 0;
        foreach($questions as $k=>$q) {
            $answ = UserQuestionAnswer::where(['user_id' => Auth::user()->id, 'question_id' => $q->id])->first();
            if($answ) {
                if($q->answer->choice->detail == $answ->choice->detail) {
                    $answerTrueScore += $q->score;
                }
            }
        }

        $data = [
            'setting' => $setting,
            'total_question' => count($questions),
            'max_score' => $max_score,
            'user' => Auth::user(),
            'detail' => $detail,
            'my_score' => $answerTrueScore
        ];

        return response()->json(['status' => true, 'data' => $data]);
    }

    public function start(Request $request)
    {
        $check = UserQuizDetail::where('user_id', Auth::user()->id)->first();
        if($check) {
            if($check->end_time) {
                return response()->json(['status' => false, 'message' => "User sudah pernah mengikuti quiz!"]);
            }
        }

        $setting = Setting::find(1);
        $time = date('Y-m-d H:i:s');

        $dataDetail = [
            'user_id' => Auth::user()->id,
            'max_time' => $setting->quiz_time,
            'start_time' => $time
        ];

        if(!$check) {
            UserQuizDetail::create($dataDetail);
        } elseif($check->start_time) {
            $endTime = strtotime("+".$setting->quiz_time." minutes", strtotime($check->start_time));
            if(strtotime($time) > $endTime) {
                serQuizDetail::where('user_id', Auth::user()->id)->update(['end_time' => $time]);
                return response()->json(['status' => false, 'message' => "Waktu telah habis!"]);
            }
        }

        $data = [
            'start' => $time,
            'max_minute' => $setting->quiz_time
        ];
        return response()->json(['status' => true, 'message' => "Selamat mengerjakan!", 'data' => $data]);
    }

}
