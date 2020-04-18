@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($user->messages as $value)
        <div class="card m-4 p-4">
            <h4>Title:</h4> {{ $value->title }}<br>
            <h4>Content:</h4> {{ $value->content }}<br>
            <a class="btn btn-outline-primary" href="{{ route('message.create', ['user' => $value->sender_id]) }}">
                Reply
            </a>
        </div>
    @endforeach
    
    <div>
        {{ $user->messages->appends(request()->query())->links() }}
    </div>
</div>
@endsection