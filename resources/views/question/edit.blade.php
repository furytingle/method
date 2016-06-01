@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.question.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    {{ Form::model($question, ['route' => ['admin.question.update', $question->id], 'method' => 'PATCH', 'role' => 'form']) }}

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('description', 'Вопрос') }}
                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
            </div>

            <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>

            {{ Form::close() }}
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">

            {{ link_to_route('admin.answer.create', 'Добавить ответ', ['question_id' => $question->id], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

            <h3>Ответы:</h3>

            @foreach($question->answers as $answer)
                <p class="@if($answer->correct) bg-success @endif">
                    <span>
                        {{ link_to_route('admin.answer.edit', 'Редактировать', ['id' => $answer->id], ['class' => 'btn btn-info']) }}
                    </span>
                    {{ $answer->text }}
                </p>
            @endforeach

        </div>
    </div>

@endsection