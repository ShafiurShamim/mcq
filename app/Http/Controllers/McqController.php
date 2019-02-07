<?php

namespace App\Http\Controllers;

use App\Grade;
use App\QuestionTopic;
use App\Subject;

class McqController extends Controller
{
    public function index()
    {
        // QuestionTopic::create([
        //     'question_id' => 2,
        //     'topic_id' => 2
        // ]);
        //  $a = QuestionTopic::where('question_id', '=', 2)->where('topic_id', '=', 2)->first()->delete();

        // Subject::create([
        //     'name' => 'Bangla',
        //     'grade_id' => 2
        // ]);
        $grades = Grade::with(['subjects.topics'])->get();

        return view('mcq.index')->withGrades($grades);
    }
}
