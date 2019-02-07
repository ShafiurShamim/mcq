<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class McqTest extends TestCase
{
    use RefreshDatabase;

    // protected $grade;

    // public function setUP()
    // {
    //     parent::setUp();
    //     $this->grade = factory(\App\Grade::class);
    // }

    /** @test */
    public function it_has_a_index_page_with_mcq_grades_subjects_and_topics()
    {
        $question_topic = create(\App\QuestionTopic::class);

        $topic = \App\Topic::findOrFail($question_topic->topic_id);
        $subject = \App\Subject::findOrFail($topic->id);
        $grade = \App\Grade::findOrFail($subject->id);

        $this->get('/')
            ->assertSee($grade->name)
            ->assertSee($subject->name)
            ->assertSee($topic->name);
    }
}
