@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.question.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    {{ Form::open(['route' => 'admin.answer.store', 'method' => 'post', 'role' => 'form']) }}

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('text', 'Ответ') }}
                {{ Form::textarea('text', '', ['class' => 'form-control']) }}
            </div>

            <div class="checkbox">
                <label><input type="checkbox" name="correct" value="1">Правильный</label>
            </div>

            <input type="hidden" name="question_id" value="{{ $question_id }}">

            <button type="submit" class="btn btn-success">Сохранить</button>

            {{ Form::close() }}
        </div>
    </div>

@endsection