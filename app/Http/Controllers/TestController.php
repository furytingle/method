<?php

namespace App\Http\Controllers;

use App\Group;
use App\Question;
use App\TestQuestion;
use Illuminate\Http\Request;

use App\Test;
use App\Http\Requests;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['passTest']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();

        return view('test.index', [
            'tests' => $tests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Test::create($data);

        $request->session()->flash('flash_message', 'Тест создан');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);

        $test_question = TestQuestion::where('test_id', $id)->get();

        if (!$test_question) {
            $questions = Question::all();
        } else {
            $query = [];

            foreach ($test_question as $tq) {
                $query[] = ['id', '<>', $tq->question_id];
            }

            $questions = Question::where($query)->get();
        }

        return view('test.edit', [
            'test' => $test,
            'questions' => $questions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);

        $data = $request->all();

        $test->name = $data['name'];
        $test->description = $data['description'];

        $test->save();

        $request->session()->flash('flash_message', 'Тест сохранен');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $test = Test::findOrFail($id);

        $test->delete();

        $request->session()->flash('flash_message', 'Тест удален');

        return redirect()->back();
    }

    public function addQuestion(Request $request)
    {
        $data = $request->all();

        $test_question = new TestQuestion();

        $test_question->test_id = $data['test_id'];
        $test_question->question_id = $data['question_id'];

        $test_question->save();

        return redirect()->back();
    }

    public function removeQuestion(Request $request)
    {
        $data = $request->all();

        $query = [
            'test_id' => $data['test_id'],
            'question_id' => $data['question_id']
        ];

        TestQuestion::where($query)->delete();

        return redirect()->back();
    }

    public function passTest($id)
    {
        $test = Test::findOrFail($id);
        $groups = Group::all();

        return view('test.pass', [
            'test' => $test,
            'groups' => $groups
        ]);
    }
}
