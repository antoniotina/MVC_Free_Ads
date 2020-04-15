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

                    Welcome {{ $user->name }}

                    <a class="dropdown-item" href="{{ route('annonce.create') }}">
                        Create an Ad
                    </a>

                    <a class="dropdown-item" href="{{ route('profile.listannonces', ['user' => Auth::id()]) }}">
                        Show my ads
                    </a>

                    <a class="dropdown-item" href="{{ route('annonce.showall') }}">
                        Show all ads
                    </a>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
