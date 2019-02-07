<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Topic;
use App\Grade;

class McqExamController extends Controller
{
    /**
     * Create a new McqTestController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make(Grade $grade, $subject, $topic)
    {
        $sid = Subject::where('grade_id', '=', $grade->id)->where('slug', '=', $subject)->firstOrFail()->id;

        //$q = Topic::where('subject_id', '=', $sid)->where('slug', '=', $topic)->with('subject', 'subject.grade')->firstOrFail();

        // return $q->subject->grade->id;
        return view('exam.make')->withTopic(
            Topic::where('subject_id', '=', $sid)->where('slug', '=', $topic)->firstOrFail()
        )->withBenchPath("/exam/bench/{$grade->slug}/{$subject}/{$topic}");
    }

    public function bench($grade_slug, $subject_slug, $topic_slug)
    {
        return view('exam.bench');
    }
}
