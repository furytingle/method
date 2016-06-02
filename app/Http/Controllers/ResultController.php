<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

use App\Http\Requests;

class ResultController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = $request->all();

        $result = new Result();

        $result->name = $data['name'];
        $result->group_id = $data['group_id'];
        $result->test_id = $data['test_id'];

        $answer = [];

        foreach ($data as $key=>$val) {
            if (strpos($key, 'question_') !== false) {
                $answer[] = $key . '=' . $val; // question_(id)=(answer_id)
            }
        }

        $result->answer = implode(',', $answer);

        $result->save();

        $request->session()->flash('flash_message', 'Ваши результаты сохранены');

        return view('result.finish');
    }

    public function index()
    {
        $results = Result::all();

        return view('result.index', [
            'results' => $results
        ]);
    }

    public function show($id)
    {
        $result = Result::findOrFail($id);

        return view('result.show', [
            'result' => $result
        ]);
    }
}
