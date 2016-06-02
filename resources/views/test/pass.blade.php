@extends('layouts.app')

@section('content')

    <div class="container">

        @include('partial.error')
        @include('partial.success')

        {{ Form::open(['route' => 'result.store', 'method' => 'post', 'role' => 'form']) }}
            <input type="hidden" name="test_id" value="{{ $test->id }}">

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('name', 'Фамилия Имя') }}
                        {{ Form::text('name', '', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        {{ Form::label('group', 'Группа') }}
                        <select class="form-control" id="group" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            @foreach($test->questions as $question)
                <div class="form-group">
                    <p>{{ $question->description }}</p>
                    @foreach($question->answers as $answer)
                        <div class="radio">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}" value="{{ $answer->id }}">{{ $answer->text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="btn btn-success">Отправить</button>

        {{ Form::close() }}

    </div>
@endsection