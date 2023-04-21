@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-auto shadow-lg rounded-1 mx-auto">
            <div class="row ">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <img src="/storage/{{$post->image}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <a class="nav-link" href="/profile/{{$post->user->id}}">
                                            <strong>{{$post->user->username}}</strong>
                                        </a>                                         
                                    </div>
                                    <div class="col-auto ps-0">
                                        <strong>{{$post->caption}}</strong>                
                                    </div>
                                </div>
                                <hr>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="{{$post->user->profile->profileImage()}}" class="border border-primary rounded-circle" style="width: 42px;aspect-ratio: 1;object-fit: cover" alt="">
                                    </div>
                                    <div class="col-auto ps-0">
                                        <strong>{{$post->caption}}</strong>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>

</div>
@endsection
