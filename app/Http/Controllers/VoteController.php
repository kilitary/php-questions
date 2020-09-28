<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;

class VoteController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function prepare(Request $request)
    {
        session(['full_name' => $request->input('full_name')]);
        session(['score' => 0]);
        session(['start_time' => Carbon::now()->timestamp]);

        Question::query()
            ->update([
                'done' => 0
            ]);

        $question = Question::first();

        return redirect('/question/' . $question->id);
    }

    public function question(Request $request, $questionId)
    {
        $question = Question::with('answers')
            ->where('id', $questionId)
            ->first();

        return view('question', compact('question'));
    }

    public function vote(Request $request, $questionId)
    {
        $question = Question::find($questionId);
        $question->done = 1;
        $question->save();

        $answer = Answer::find($request->input('answer'));

        $score = session('score');
        if($answer->correct) {
            $score++;
        }

        session(['score' => $score]);

        $question = Question::where('done', 0)
            ->inRandomOrder()
            ->first();

        if(!$question) {
            return redirect('/done');
        }

        return redirect('/question/' . $question->id);
    }

    public function done(Request $request)
    {
        $score = session('score');
        $fullName = session('full_name');
        $startTime = session('start_time');

        $fullTime = Carbon::now()->timestamp - $startTime;

        \DB::table('results')
            ->insert([
                'score' => $score,
                'full_name' => $fullName,
                'time' => $fullTime
            ]);

        return view('done');
    }
}
