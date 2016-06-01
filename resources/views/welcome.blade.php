@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($tests as $test)
                <p>
                    {{ link_to_route('test.pass', $test->name,['id' => $test->id], ['class' => 'btn btn-primary']) }}
                </p>
            @endforeach
        </div>
    </div>
</div>
@endsection
