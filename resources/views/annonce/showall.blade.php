@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Ads</h1>
    @foreach($annonces as $value)
        <div class="card">
            <h2>{{$value->user->name}}'s Ad</h2>
            <h4>Title:</h4> {{ $value->title }}<br>
            <h4>Description:</h4> {{ $value->description }}<br>
            <h4>Price:</h4> {{ $value->price }}$<br>
        </div>
    @endforeach
</div>
@endsection