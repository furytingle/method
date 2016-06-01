@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::open(['route' => 'result.store', 'method' => 'post', 'role' => 'form']) }}
            @foreach($test->questions as $question)
                <div class="form-group">
                    <p>{{ $question->description }}</p>
                    @foreach($question->answers as $answer)
                        <div class="radio">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}">{{ $answer->text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        {{ Form::close() }}

    </div>
@endsection