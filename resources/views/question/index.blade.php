@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.question.create', 'Добавить вопрос', [], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>Вопрос</th>
                <th>Ответы:</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $question->description }}</td>
                    <td>
                        {{ link_to_route('admin.question.edit', 'Редактировать', ['id' => $question->id], ['class' => 'btn btn-info']) }}
                    </td>
                    <td>
                        @foreach($question->answers as $answer)
                            <p class="@if($answer->correct) bg-success @endif">{{ $answer->text }}</p>
                        @endforeach
                    </td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.question.destroy', 'id' => $question->id], 'id' => 'deleteForm']) }}
                            {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection