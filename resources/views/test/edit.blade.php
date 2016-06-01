@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.test.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    <div class="row">
        <div class="col-md-5">
            {{ Form::model($test, ['route' => ['admin.test.update', $test->id], 'method' => 'PATCH', 'role' => 'form']) }}

            <div class="form-group">
                {{ Form::label('name', 'Название') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Описание') }}
                {{ Form::textarea('description', null, ['class' => 'form-control']) }}
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>

            {{ Form::close() }}

            <h3>Вопросы:</h3>
            <table>
                @foreach($test->questions as $question)
                    <tr>
                        <td>{{ $question->description }}</td>
                        <td>
                            {{ Form::open(['method' => 'POST', 'route' => 'admin.test.remove']) }}
                                <input type="hidden" name="test_id" value="{{ $test->id }}">
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="col-md-1"></div>

        <div class="col-md-5">
            <h3>Доступные вопросы:</h3>
            <table class="table">
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->description }}</td>
                        <td>
                            {{ Form::open(['method' => 'POST', 'route' => 'admin.test.add']) }}
                                <input type="hidden" name="test_id" value="{{ $test->id }}">
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection