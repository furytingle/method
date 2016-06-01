@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.test.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    <div class="row">
        <div class="col-md-5">

            {{ Form::open(['route' => 'admin.test.store', 'method' => 'post', 'role' => 'form']) }}

            <div class="form-group">
                {{ Form::label('name', 'Название') }}
                {{ Form::text('name', '', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Описание') }}
                {{ Form::textarea('description', '', ['class' => 'form-control']) }}
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>

            {{ Form::close() }}

        </div>
    </div>

@endsection