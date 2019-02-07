<?php

use Faker\Generator as Faker;

$factory->define(App\Grade::class, function (Faker $faker) {
    $name = "Grade-{$faker->unique()->word}";
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->sentence,
        'color' => $faker->hexcolor
    ];
});

$factory->define(App\Subject::class, function ($faker) {
    $name = "Subject-{$faker->unique()->word}";
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'grade_id' => function () {
            return factory(\App\Grade::class)->create()->id;
        },
        'description' => $faker->sentence,
        'color' => $faker->hexcolor
    ];
});

$factory->define(App\Topic::class, function ($faker) {
    $name = "Topic-{$faker->unique()->word}";
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'subject_id' => function () {
            return factory(\App\Subject::class)->create()->id;
        },
        'description' => $faker->sentence,
        'color' => $faker->hexcolor
    ];
});

$factory->define(App\Question::class, function ($faker) {
    return [
        'question' => $faker->sentence,
        'answer' => $faker->word,
        'options' => 'opt-1|opt-2|opt-3'
    ];
});

$factory->define(App\QuestionTopic::class, function ($faker) {
    return [
        'question_id' => function () {
            return factory(\App\Question::class)->create()->id;
        },
        'topic_id' => function () {
            return factory(\App\Topic::class)->create()->id;
        }
    ];
});
