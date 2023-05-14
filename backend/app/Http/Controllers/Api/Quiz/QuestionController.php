<?php

namespace App\Http\Controllers\Api\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Quiz\Question;
use App\Quiz\UserQuestionAnswer;
use App\Quiz\UserQuizDetail;
use App\Setting;

use Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::with('choices', 'answer.choice')->orderBy('id', 'desc');
        return response()->json(['status' => true, 'questions' => $questions->paginate()]);
    }

    public function randomQuestion()
    {
        $questions = Question::with('choices', 'answer')->inRandomOrder()->get();
        $question = null;
        $i = 0;
        foreach($questions as $quest) {
            $check = UserQuestionAnswer::where([
                'question_id' => $quest->id,
                'user_id' => Auth::user()->id
                ])->first();

            if(!$check) {
                $question = $quest;
                $i++;
            }
        }

        if($question) {
            return response()->json(['status' => true, 'data' =>$question, 'sisa' => $i-1]);
        }

        return response()->json(['status' => false, 'message' => "Pertanyaan sudah habis!"]);
    }

    public function sendAnswer(Request $request)
    {
        $jawaban = $request->input('jawaban');
        foreach($jawaban as $key=>$val) {
            UserQuestionAnswer::where([
                'user_id' => Auth::user()->id,
                'question_id' => $key
            ])->delete();
            UserQuestionAnswer::create([
                'question_id' => $key,
                'choice_id' => $val,
                'user_id' => Auth::user()->id,
            ]);
        }

        return response()->json(['status' => true, 'message' => 'Success']);
    }

    public function finish(Request $request)
    {
        $time = date('Y-m-d H:i:s');
        UserQuizDetail::where('user_id', Auth::user()->id)->update(['end_time' => $time]);
        return response()->json(['status' => true, 'message' => 'Quiz telah selesai!']);
    }

    public function requestTime(Request $request)
    {
        $detail = UserQuizDetail::where('user_id', Auth::user()->id)->first();
        $setting = Setting::find(1);
        $time = date('Y-m-d H:i:s');
        $endTime = strtotime("+".$setting->quiz_time." minutes", strtotime($detail->start_time));

        $start_time = new Carbon($time);
        $end_time = new Carbon(date('Y-m-d H:i:s', $endTime));

        $diff = $end_time->diffInSeconds($start_time);
        $status = true;
        if($diff < 0) {
            $status = false;
        }

        return response()->json(['status' => $status, 'time' => $diff, 'endtime' => date('Y-m-d H:i:s', $endTime)]);
    }
}
