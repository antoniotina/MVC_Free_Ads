@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::check())
        <form action="{{ route('message.add', $user) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="content" class="col-md-4 col-form-label">Content</label>
                <div class="col-md-6">
                    <input id="content" 
                        type="textarea" 
                        class="form-control 
                        @error('content') is-invalid @enderror" 
                        name="content" 
                        value="" 
                        required 
                        autocomplete="content" 
                        rows="4" 
                        cols="50" 
                        autofocus>

                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <button class="btn  form-control btn-primary">Send Message</button>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection