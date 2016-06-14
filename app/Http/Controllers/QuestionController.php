<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('question.index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
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

        Question::create($data);

        $request->session()->flash('flash_message', 'Вопрос создан');

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
        $question = Question::findOrFail($id);

        return view('question.edit', [
            'question' => $question
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
        $question = Question::findOrFail($id);

        $this->validate($request, [
            'picture' => 'image|max:3000'
        ]);

        $data = $request->except(['picture']);

        $path = 'upload/picture';

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $name = substr(md5($id), 0, 10);

            $st = $picture->move($path, $name);
        }

        $question->fill($data);
        if ($data['type'] == 2) {
            $answer = new Answer();

            $answer->question_id = $question->id;
        }

        $request->session()->flash('flash_message', 'Вопрос сохранен');

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
        $question = Question::findOrFail($id);

        $question->delete();

        $request->session()->flash('flash_message', 'Вопрос удален');

        return redirect()->back();
    }
}
