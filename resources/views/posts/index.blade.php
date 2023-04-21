@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($posts))
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-6 mb-3 mx-auto">
                    <div class="row align-items-center mb-2">
                        <div class="col-auto">
                            <img src="{{$post->user->profile->profileImage()}}" class=" border border-primary rounded-circle" style="width: 42px;aspect-ratio: 1;object-fit: cover" alt="">
                        </div>
                        <div class="col-auto ps-0">
                            <a class="nav-link" href="/profile/{{$post->user->id}}">
                                <strong>{{$post->user->username}}</strong>
                            </a>                 
                        </div>
                    </div>      
                    <div class="row">
                        <img src="/storage/{{$post->image}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="row mt-2 border-bottom">
                        <div class="col-auto">
                            <strong>{{ $post->user->username}}</strong>
                            
                        </div>
                        <div class="col mb-2">
                            {{ $post->caption}}
                        </div>
                    </div>                              
                                
                </div>
            </div> 
        @endforeach
        <div class="row">
            <div class="col-auto mx-auto">
                {{ $posts->links()}}
            </div>
        </div>
    @else
        <h1>No Posts</h1>
    @endif

 

</div>
@endsection
