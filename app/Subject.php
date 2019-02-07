<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['name', 'slug', 'grade_id'];

    /**
     * A subject may have many topics.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * A subject belongs to a grade.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function grade()
    // {
    //     return $this->belongsTo(Grade::class);
    // }

    /**
     * Set the name of the subject.
     *
     * @param string $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }
}
