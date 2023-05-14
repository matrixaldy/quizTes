<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\QuestionImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\Quiz\ImportRequest;
use Session;
use Auth;
use Validator;

use App\Setting;
use App\Quiz\Question;
use App\Quiz\QuestionAnswer;
use App\Quiz\QuestionAnswerChoice;
use App\Quiz\UserQuizDetail;

class ImportController extends Controller
{
    public function importPage(Request $request)
    {
        $setting = Setting::findOrFail(1);
        $totalScore = Question::sum('score');

        $maxScore = $setting->max_score - $totalScore;
        if($maxScore < 0) {
            $maxScore = 0;
        }
        $data = [
            'total_score' => $totalScore,
            'max_score' => $maxScore
        ];
        return view('pages.question.import', $data);
    }
    public function import(ImportRequest $request)
    {
        Excel::import(new QuestionImport, $request->file('file'));
        $questions = Session::get('questions', []);

        if(!$questions) {
            Session::flash('notif-message', "Format file salah!");
            Session::flash('notif-type', "errorToast");
            return redirect()->back()->withInput();
        }

        $setting = Setting::findOrFail(1);
        $totalScore = Question::sum('score');

        $scored = 0;
        foreach($questions as $quest) {
            $scored += $quest['score'];
        }

        if($totalScore+$scored > $setting->max_score) {
            Session::flash('notif-message', "Total score sudah ".$totalScore." dari ".$setting->max_score.", Hanya tersisa ".($setting->max_score - $totalScore));
            Session::flash('notif-type', "errorToast");
            return redirect()->back()->withInput();
        }

        foreach($questions as $quest) {
            $questionData = [
                'score' => $quest['score'],
                'question' => $quest['question']
            ];

            $idQuest = Question::create($questionData)->id;
            $idJawaban = null;
            $pilihan_1 = QuestionAnswerChoice::create([
                'question_id' => $idQuest,
                'detail' => $quest['pilihan_1']
            ])->id;

            if($quest['jawaban'] == $quest['pilihan_1']) {
                $idJawaban = $pilihan_1;
            }

            $pilihan_2 = QuestionAnswerChoice::create([
                'question_id' => $idQuest,
                'detail' => $quest['pilihan_2']
            ])->id;

            if($quest['jawaban'] == $quest['pilihan_2']) {
                $idJawaban = $pilihan_2;
            }

            $pilihan_3 = QuestionAnswerChoice::create([
                'question_id' => $idQuest,
                'detail' => $quest['pilihan_3']
            ])->id;

            if($quest['jawaban'] == $quest['pilihan_3']) {
                $idJawaban = $pilihan_3;
            }

            $pilihan_4 = QuestionAnswerChoice::create([
                'question_id' => $idQuest,
                'detail' => $quest['pilihan_4']
            ])->id;

            if($quest['jawaban'] == $quest['pilihan_4']) {
                $idJawaban = $pilihan_4;
            }

            if($idJawaban != null) {
                QuestionAnswer::create(['question_id' => $idQuest, 'choice_id' => $idJawaban]);
            }

            Session::forget('questions');
        }
        Session::flash('notif-message', "Soal berhasil ditambahkan!");
        Session::flash('notif-type', "infoToast");
        return redirect()->route('quiz.index');
        // return response()->json(['status' => true, 'message' => 'Berhasil ditambahkan!']);
    }
}
