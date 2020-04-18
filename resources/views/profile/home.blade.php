@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ( $user->id == Auth::id())
                    Welcome {{ $user->name }}

                    <a class="dropdown-item" href="{{ route('annonce.create') }}">
                        Create an Ad
                    </a>

                    <a class="dropdown-item" href="{{ route('profile.listannonces', ['user' => Auth::id()]) }}">
                        Show my ads
                    </a>

                    <a class="dropdown-item"  href="{{ route('message.show', ['user' => Auth::id()]) }}">
                        
                        Messages 
                        @if ($user->newMessages)
                            (<small>{{ $user->newMessages }} new message(s)</small>)
                        @endif
                    </a>
                    @else
                    Welcome to {{ $user->name }}'s profile

                    <a class="dropdown-item" href="{{ route('message.create', ['user' => $user->id]) }}">
                        Send them a message
                    </a>
                    <a class="dropdown-item" href="{{ route('profile.listannonces', ['user' => $user->id]) }}">
                        Show their ads
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
