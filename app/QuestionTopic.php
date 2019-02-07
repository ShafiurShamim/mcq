<?php

namespace App;

use App\Traits\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class QuestionTopic extends Model
{
    use HasCompositePrimaryKey;

    /**
     * The primary keys for the model.
     *
     * @var array
     */
    protected $primaryKey = ['question_id', 'topic_id'];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_topic';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'topic_id'
    ];

    /**
    * Boot the instance.
    */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($question_topic) {
            $question_topic->topic->increment('questions_count');
        });

        static::deleted(function ($question_topic) {
            $question_topic->topic->decrement('questions_count');
            session()->flash('message', 'Qestion Topic has been deleted!');
        });
    }

    /**
     * A topic belongs to a question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function question()
    // {
    //     return $this->belongsTo(Question::class);
    // }

    /**
     * A question belongs to a topic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
