<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    public $timestamps = false;

    protected $fillable = [
        'name', 'description'
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'test_question');
    }
}
