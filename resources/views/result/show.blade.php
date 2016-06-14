@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    {{ link_to_route('admin.result.index', 'Назад', [], ['class' => 'btn btn-link']) }}

    <h4>{{ $result->name }}</h4><span>{{ $result->group->name }}</span>

    <p>{{ $result->test->name }}</p>

    <table class="table table-hover">
        <tr>
            <th>Вопрос</th>
            <th>Ответы</th>
        </tr>
        @foreach($result->check() as $id=>$question)
            <tr>
                <td>{{ $question['description'] }}</td>
                <td>
                    @foreach($question['answers'] as $answer)
                        <p class="@if($answer['correct'] && $answer['checked']) bg-success
                        @elseif($answer['checked'] && !$answer['correct']) bg-danger
                        @elseif($answer['correct'] && !$answer['checked']) bg-success
                        @endif">
                            {{ $answer['text'] }}
                        </p>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>

@endsection