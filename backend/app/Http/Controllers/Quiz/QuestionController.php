<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Quiz\CreateRequest;
use App\Http\Requests\Quiz\UpdateRequest;

use Session;

use App\Quiz\Question;
use App\Quiz\QuestionAnswer;
use App\Quiz\QuestionAnswerChoice;
use App\Quiz\UserQuizDetail;
use App\Setting;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $questions = Question::orderBy('id', 'desc');
        if($request->input('search')) {
            $questions->where('id', $request->input('search'))
                ->orWhere('question', 'LIKE', '%'.$request->input('search').'%');
        }

        $setting = Setting::findOrFail(1);
        $totalScore = Question::sum('score');

        $maxScore = $setting->max_score - $totalScore;

        $data = [
            'questions' => $questions->paginate(),
            'max_score' => $maxScore,
            'score' => $totalScore."/".$setting->max_score
        ];

        return view('pages.question.index', $data);
    }

    public function create(Request $request)
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
        return view('pages.question.create', $data);
    }

    public function store(CreateRequest $request)
    {
        $setting = Setting::findOrFail(1);
        $totalScore = Question::sum('score');

        if($totalScore+$request->input('score') > $setting->max_score) {
            Session::flash('notif-message', "Total score sudah ".$totalScore." dari ".$setting->max_score.", Hanya tersisa ".($setting->max_score - $totalScore));
            Session::flash('notif-type', "errorToast");
            return redirect()->back()->withInput();
        }
        $questionData = [
            'score' => $request->input('score'),
            'question' => $request->input('question')
        ];

        $idQuest = Question::create($questionData)->id;
        $idJawaban = null;
        $pilihan = $request->input('pilihan');
        $jawaban = $request->input('jawaban');
        foreach($pilihan as $key=>$val) {
            if($val) {
                $pilihan = [
                    'question_id' => $idQuest,
                    'detail' => $val
                ];

                $idAns = QuestionAnswerChoice::create($pilihan)->id;
                if($jawaban == $key) {
                    $idJawaban = $idAns;
                }
            }
        }

        if($idJawaban != null) {
            QuestionAnswer::create(['question_id' => $idQuest, 'choice_id' => $idJawaban]);
        }

        Session::flash('notif-message', "Soal berhasil ditambahkan!");
        Session::flash('notif-type', "infoToast");
        return redirect()->route('quiz.index');
    }

    public function edit($id, Request $request)
    {
        $setting = Setting::findOrFail(1);
        $totalScore = Question::where('id', '!=', $id)->sum('score');

        $maxScore = $setting->max_score - $totalScore;
        if($maxScore < 0) {
            $maxScore = 0;
        }
        $data = [
            'total_score' => $totalScore,
            'max_score' => $maxScore,
            'question' => Question::find($id),
            'choices' => QuestionAnswerChoice::where('question_id', $id)->get(),
            'answer' => QuestionAnswer::where('question_id', $id)->first()
        ];
        return view('pages.question.edit', $data);
    }

    public function update($id, UpdateRequest $request)
    {
        $setting = Setting::findOrFail(1);
        $totalScore = Question::where('id', '!=', $id)->sum('score');

        if($totalScore+$request->input('score') > $setting->max_score) {
            Session::flash('notif-message', "Total score sudah ".$totalScore." dari ".$setting->max_score.", Hanya tersisa ".($setting->max_score - $totalScore));
            Session::flash('notif-type', "errorToast");
            return redirect()->back()->withInput();
        }

        $question = Question::find($id);

        $questionData = [
            'score' => $request->input('score'),
            'question' => $request->input('question')
        ];

        $question->update($questionData);

        $idJawaban = null;
        $pilihan = $request->input('pilihan');
        $jawaban = $request->input('jawaban');
        QuestionAnswerChoice::where('question_id',$id)->delete();

        foreach($pilihan as $key=>$val) {
            if($val) {
                $pilihan = [
                    'question_id' => $id,
                    'detail' => $val
                ];

                $idAns = QuestionAnswerChoice::create($pilihan)->id;
                if($jawaban == $key) {
                    $idJawaban = $idAns;
                }
            }
        }

        if($idJawaban != null) {
            QuestionAnswer::create(['question_id' => $id, 'choice_id' => $idJawaban]);
        }

        Session::flash('notif-message', "Soal berhasil diupdate!");
        Session::flash('notif-type', "infoToast");
        return redirect()->route('quiz.index');
    }

    public function delete($id)
    {
        $question = Question::findOrFail($id);
        if($question) {
            $question->delete();
            Session::flash('notif-message', "Soal berhasil dihapus!");
            Session::flash('notif-type', "infoToast");
        } else {
            Session::flash('notif-message', "Soal tidak ditemukan!");
            Session::flash('notif-type', "infoToast");
        }

        return redirect()->back();
    }

    public function resetQuiz(Request $request)
    {
        Question::whereNotNull('id')->delete();
        UserQuizDetail::whereNotNull('id')->delete();

        Session::flash('notif-message', "Data berhasil direset!");
        Session::flash('notif-type', "infoToast");
        return redirect()->route('quiz.index');
    }
}
