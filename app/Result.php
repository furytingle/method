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
        $answers = explode(',', $this->answer);

        $score = 0;

        foreach ($answers as $answer) {
            foreach ($this->correctAnswers() as $correctAnswer) {
                if ($answer == $correctAnswer) {
                    $score += 1;
                }
            }
        }

        return $score . '/' . count($answers);
    }

    public function check()
    {
        $answers = explode(',', $this->answer);

        $questionAnswer = [];

        foreach ($answers as $answer) {
            $qa = explode('=', $answer);

            $question_id = substr($qa[0], strpos($qa[0], '_') + 1);
            $checked = $qa[1];

            $question = Question::find($question_id);

            $questionAnswer[$question_id]['description'] = $question->description;

            foreach ($question->answers as $a) {
                $c = 0;
                if ($a->id == $checked) {
                    $c = 1;
                }
                $questionAnswer[$question_id]['answers'][] = [
                    'id' => $a->id,
                    'text' => $a->text,
                    'question_id' => $a->question_id,
                    'correct' => $a->correct,
                    'checked' => $c
                ];
            }
        }

        return $questionAnswer;
    }

    protected function correctAnswers()
    {
        $test = Test::find($this->test_id)->first();

        $correctAnswers = [];
        foreach ($test->questions as $question) {
            $a = $question->answers->where('correct', 1)->first();
            $correctAnswers[] = 'question_' . $question->id . '=' . $a->id;
        }

        return $correctAnswers;
    }
}
