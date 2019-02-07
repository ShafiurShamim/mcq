<?php

use Illuminate\Database\Seeder;
use App\Grade;
use Illuminate\Support\Facades\Schema;
use App\Subject;
use App\Topic;
use App\Question;
use App\QuestionTopic;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->grades()->subjects()->topics();
        $this->questions()->question_topic();

        Schema::enableForeignKeyConstraints();
    }

    /**
     * seed the grade table
     */
    protected function grades()
    {
        Grade::truncate();

        collect([
            [
                'name' => 'Five',
                'description' => 'Some description for Grade five',
                'color' => '#008000'
            ],
            [
                'name' => 'Six',
                'description' => 'Some description for Grade six',
                'color' => '#cccccc'
            ],
            [
                'name' => 'Seven',
                'description' => 'Some description for Grade seven',
                'color' => '#cccccc'
            ]
        ])->each(function ($grade) {
            factory(Grade::class)->create([
                'name' => $grade['name'],
                'slug' => str_slug($grade['name']),
                'description' => $grade['description'],
                'color' => $grade['color']
            ]);
        });

        return $this;
    }

    protected function subjects()
    {
        Subject::truncate();
        collect([
            [
                'name' => 'English',
                'description' => 'Some description for English',
                'color' => '#008000'
            ],
            [
                'name' => 'Math',
                'description' => 'Some description for Math ',
                'color' => '#cccccc'
            ],
            [
                'name' => 'Science',
                'description' => 'Some description for science',
                'color' => '#cccccc'
            ]
        ])->each(function ($subject) {
            factory(Subject::class)->create([
                'name' => $subject['name'],
                'slug' => str_slug($subject['name']),
                'grade_id' => Grade::all()->random()->id,
                'description' => $subject['description'],
                'color' => $subject['color']
            ]);
        });
        return $this;
    }

    protected function topics()
    {
        Topic::truncate();
        collect([
            [
                'name' => 'Topic 1',
                'description' => 'Some description for topic',
                'color' => '#008000'
            ],
            [
                'name' => 'Topic 2',
                'description' => 'Some description for Topic 2',
                'color' => '#cccccc'
            ],
            [
                'name' => 'Topic 3',
                'description' => 'Some description for Topic 3',
                'color' => '#cccccc'
            ]
        ])->each(function ($topic) {
            factory(Topic::class)->create([
                'name' => $topic['name'],
                'slug' => str_slug($topic['name']),
                'subject_id' => Subject::all()->random()->id,
                'description' => $topic['description'],
                'color' => $topic['color']
            ]);
        });
        return $this;
    }

    protected function questions()
    {
        Question::truncate();

        factory(Question::class, 30)->create([
            'question' => 'question name',
            'answer' => 'correct',
            'options' => 'opt-1|opt-2|opt-3'
        ]);
        return $this;
    }

    protected function question_topic()
    {
        QuestionTopic::truncate();

        Question::all()->each(function ($question) {
            factory(QuestionTopic::class)->create([
                'question_id' => $question->id,
                'topic_id' => Topic::all()->random()->id
            ]);
        });
    }
}
