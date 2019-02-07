<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class McqExamTest extends TestCase
{
    use RefreshDatabase;
    protected $topic;
    protected $subject;
    protected $grade;

    public function setUP()
    {
        parent::setUp();

        $question_topic = create(\App\QuestionTopic::class);

        $this->topic = \App\Topic::findOrFail($question_topic->topic_id);
        $this->subject = \App\Subject::findOrFail($this->topic->id);
        $this->grade = \App\Grade::findOrFail($this->subject->id);
    }

    /** @test */
    public function an_unauthenticated_user_may_not_make_question()
    {
        $this->get($this->getTopicFullPath('exam/make'))
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_may_make_question()
    {
        $this->signIn();

        $this->get($this->getTopicFullPath('exam/make'))
            ->assertSee($this->topic->title)
            ->assertSee($this->topic->questions_count);
    }

    /** @test */
    public function an_unauthenticated_user_may_not_sit_exam_bench()
    {
        $this->get($this->getTopicFullPath('exam/bench'))
            ->assertRedirect('/login');
    }

    protected function getTopicFullPath($path = '')
    {
        return str_replace('//', '/', "/{$path}/{$this->grade->slug}/{$this->subject->slug}/{$this->topic->slug}");
    }
}
