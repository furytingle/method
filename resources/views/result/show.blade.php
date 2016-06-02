@extends('layouts.admin')

@section('content')

    @include('partial.error')
    @include('partial.success')

    <h4>{{ $result->name }}</h4><span>{{ $result->group->name }}</span>

    <p>{{ $result->test->name }}</p>

    <table class="table table-hover">
        <tr>
            <th>Вопрос</th>
            <th>Ответы</th>
        </tr>
        @foreach($result->test->questions as $question)
            <tr>
                <td>{{ $question->description }}</td>
                <td>
                    
                </td>
            </tr>
        @endforeach
    </table>


@endsection