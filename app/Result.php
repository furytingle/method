<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    public $timestamps = false;

    protected $fillable = [
        'name', 'group_id', 'test_id', 'answer'
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function total()
    {
        $test = Test::findOrFail($this->test_id);

        $correct_answers = [];
        foreach ($test->questions as $question) {
            $a = $question->answers->where('correct', 1)->first();
            $correct_answers[] = 'question_' . $question->id . '=' . $a->id;
        }

        $answers = explode(',', $this->answer);

        $score = 0;

        foreach ($answers as $answer) {
            foreach ($correct_answers as $correct_answer) {
                if ($answer == $correct_answer) {
                    $score += 1;
                }
            }
        }

        return $score . '/' . count($answers);
    }
}
