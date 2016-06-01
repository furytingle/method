@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.question.edit', 'Назад', ['id' => $answer->question->id], ['class' => 'btn btn-link']) }}

    <div class="row">
        <div class="col-md-5">
            {{ Form::model($answer, ['route' => ['admin.answer.update', $answer->id], 'method' => 'PATCH', 'role' => 'form']) }}

            <div class="form-group">
                {{ Form::label('text', 'Вопрос') }}
                {{ Form::textarea('text', null, ['class' => 'form-control']) }}
            </div>

            <div class="checkbox">
                <label><input type="checkbox" name="correct" value="1" @if($answer->correct) checked @endif>Правильный</label>
            </div>

            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>

            {{ Form::close() }}
        </div>

    </div>

@endsection