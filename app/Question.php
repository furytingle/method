<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public $timestamps = false;

    protected $fillable = [
        'description', 'type'
    ];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
