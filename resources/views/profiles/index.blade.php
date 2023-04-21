@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-10 mx-auto">
            <div class="row">
                <div class="col col-md-3 me-md-5 ">
                    <img src="{{ $user->profile->profileImage()}}" class="img-fluid d-block mx-auto rounded-circle  shadow" style="max-width: 150px;aspect-ratio: 1;object-fit: cover;"  alt="">
                </div>
                <div class="col col-md-8">
                    <div class="row align-items-center mb-2">
                        <div class="col-auto">
                            <div class="">
                                <strong>{{$user->username}}</strong>
                            </div>                 
                        </div>
                        
                        @can('update', $user->profile)
                            <div class="col">
                                <a href="\profile\{{$user->id}}\edit" class="btn btn-light">Edit Profile</a>
                            </div>
                        @endcan

                        @cannot('update', $user->profile)
                            <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                        @endcannot
                    </div>
                    
                    <div class="row mb-2">
                        <span>
                            <strong>{{$user->profile->title}}</strong> 
                        </span> 
                        <span>
                            {{$user->profile->description}}
                        </span>  
                        <span>
                            <a href="{{$user->profile->url}}" class="nav-link text-primary">
                            {{$user->profile->url}}
                        </a>
                        </span>             
                        
                    </div>
                    
                    <div class="row mb-3">             
                        <div class="col-auto">    
                            <strong>{{ $postCount }} </strong>posts              
                        </div>
                        <div class="col-auto">    
                            <strong>{{ $followersCount}} </strong>followers               
                        </div>
                        <div class="col-auto">    
                            <strong>{{ $followingCount}} </strong>following              
                        </div>
                    </div>
                    
                    @can('update',$user->profile)<div class="row">
                         <div class="col">
                            <a href="\p\create" class="btn btn-secondary">Add New Post</a>
                        </div>
                    </div>@endcan
                </div>
            </div>  
            <br>
            <hr>
            <br>
            <div class="row">
                @foreach($user->posts as $post)
                <div class="col-6 col-md-4 p-1" >
                    <a href="/p/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" style="width: 100%;aspect-ratio: 1;object-fit: cover" alt="">
                    </a>
                </div>
                @endforeach

            </div>           
        </div>
    </div>

</div>
@endsection
