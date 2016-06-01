<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public $timestamps = false;

    protected $fillable = [
        'name', 'topic'
    ];
}