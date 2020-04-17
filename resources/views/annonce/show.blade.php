@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$user->name}}'s Ads</h1>
    @foreach($user->annonces as $value)
        <div class="card">
            <h4>Title:</h4> {{ $value->title }}<br>
            <h4>Description:</h4> {{ $value->description }}<br>
            <h4>Price:</h4> {{ $value->price }}$<br>
            @if(Auth::check() && Auth::id() == $user->id)
                <a class="dropdown-item" href="{{ route('annonce.edit', $value->id ) }}">
                    Update ad
                </a>
                <form action="{{ route('annonce.delete', $value->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary">Delete ad</button>
                </form>
            @endif
        </div>
    @endforeach
</div>
@endsection