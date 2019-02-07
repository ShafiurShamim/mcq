<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['name', 'slug'];

    /**
    * A grade may have many subjects.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    /**
    * Get the route key name for Laravel.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the name of the grade.
     *
     * @param string $name
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }
}
