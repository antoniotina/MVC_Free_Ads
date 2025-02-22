@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::check())
        <form action="{{ route('profile.update', ['user' => Auth::id()]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="email" class="col-md-4 col-form-label">Email</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email  }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="password" class="col-md-4 col-form-label">Password</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') ?? $user->password  }}" required autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                

                <div class="col-md-3">
                    <button class="btn  form-control btn-primary">Apply Changes</button>
                </div>
            </div>
        </form>
        <div class="col-md-3">
            <form action="{{ route('delete', ['user' => Auth::id()]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-primary">Delete account</button>
            </form>
            {{-- <a href="{{ route('delete', ['user' => Auth::id()]) }}">Delete account</a> --}}
        </div>
    @endif
</div>
@endsection