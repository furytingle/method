@extends('layouts.admin')

@section('content')

    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>Фамилия и Имя</th>
                <th>Группа</th>
                <th>Тест</th>
                <th>Результат</th>
                <th></th>
            </tr>
            @foreach($results as $result)
                <tr>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->group->name }}</td>
                    <td>{{ $result->test->name }}</td>
                    <td>{{ $result->total() }}</td>
                    <td>{{ link_to_route('admin.result.show', 'Детально', ['id' => $result->id], ['class' => 'btn btn-primary']) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection