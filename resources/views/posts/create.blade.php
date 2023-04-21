@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-8 mx-auto">
            <div class="row">
                <h2>Add New Post</h2>
            </div>
            <form action="/p" enctype="multipart/form-data" method='post'>
                @csrf
                <div class="row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
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
