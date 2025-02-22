@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Ads</h1>
    @foreach($annonces as $value)
    
        <div class="card m-4 p-4">
            <h3>By: </h3><a href="{{ route('profile.show', $value->user->id) }}">{{ $value->user->name }}</a><br>
            <h4>Title:</h4> {{ $value->title }}<br>
            <h4>Description:</h4> {{ $value->description }}<br>
            <h4>Price:</h4> {{ $value->price }}$<br>
        </div>
    @endforeach
    <div>
        {{ $annonces->appends(request()->query())->links() }}
    </div>
</div>
@endsection