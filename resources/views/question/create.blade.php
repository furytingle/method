@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.question.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            {{ Form::open(['route' => 'admin.question.store', 'method' => 'post', 'role' => 'form']) }}

            <div class="form-group">
                {{ Form::label('type', 'Тип вопроса') }}
                <select class="form-control" id="type" name="type">
                    <option value="1">Варианты ответа</option>
                    <option value="2">Изображение и свой вариант</option>
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Вопрос') }}
                {{ Form::textarea('description', '', ['class' => 'form-control']) }}
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>

            {{ Form::close() }}
        </div>
    </div>

@endsection