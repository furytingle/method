@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.test.create', 'Добавить тест', [], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->description }}</td>
                    <td>
                        {{ link_to_route('admin.test.edit', 'Редактировать', ['id' => $test->id], ['class' => 'btn btn-info']) }}
                    </td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.test.destroy', 'id' => $test->id], 'id' => 'deleteForm']) }}
                            {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection