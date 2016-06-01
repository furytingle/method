@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.group.create', 'Добавить группу', [], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>Название</th>
                <th>Предмет</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->topic }}</td>
                    <td>
                        {{ link_to_route('admin.group.edit', 'Редактировать', ['id' => $group->id], ['class' => 'btn btn-info']) }}
                    </td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.group.destroy', 'id' => $group->id], 'id' => 'deleteForm']) }}
                            {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection