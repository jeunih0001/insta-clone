@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-8 mx-auto">
            <div class="row">
                <h2>Edit Profile</h2>
            </div>
            <form action="/profile/{{$user->id}}" method='post' enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
                <div class="row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="row">
                    <label for="url" class="col-md-4 col-form-label">Url</label>
                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile Picture</label>
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>      
                  
        </div>
    </div>

</div>
@endsection
