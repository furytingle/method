<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_question';

    public $timestamps = false;

    protected $fillable = [
        'test_id', 'question_id'
    ];

}
