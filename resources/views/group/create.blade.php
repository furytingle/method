@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.group.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    {{ Form::open(['route' => 'admin.group.store', 'method' => 'post', 'role' => 'form']) }}

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('name', 'Полное название') }}
                {{ Form::text('name', '', ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('topic', 'Предмет') }}
                {{ Form::text('topic', '', ['class' => 'form-control']) }}
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>

            {{ Form::close() }}
        </div>
    </div>

@endsection