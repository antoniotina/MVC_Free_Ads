@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::check())
        <form action="{{ route('annonce.add') }}" enctype="multipart/form-data" method="POST">
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

                <label for="description" class="col-md-4 col-form-label">Description</label>
                <div class="col-md-6">
                    <input id="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" value="" required autocomplete="description" rows="4" cols="50" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="price" class="col-md-4 col-form-label">Price</label>
                <div class="col-md-6">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="" required autocomplete="price" autofocus>

                    @error('price')
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
    @endif
</div>
@endsection