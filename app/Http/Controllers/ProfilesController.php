<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class ProfilesController extends Controller
{
    //
    public function index(User $user){
        $follows = (auth()->user() ? auth()->user()->following->contains($user->id) : false);
        $postCount = Cache::remember(
            'count.posts'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();}
            );
        $followersCount = Cache::remember(
            'count.posts'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();}
            );
        $followingCount = Cache::remember(
            'count.posts'.$user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();}
            );
        return view('profiles.index', compact('user','follows','postCount','followersCount','followingCount'));
    }
    public function edit(User $user){
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => '',
            'description' =>'',
            'url' => 'url',
            'image' => 'image',
        ]);
        if (request('image'))
        {
            $imagePath = request('image')->store('profiles','public');
            $imageArray = ['image'=>$imagePath];
        }
        
        auth()->user()->profile()->update(array_merge(  
            $data,
            $imageArray ?? [],
        ));

        return redirect('/profile/'.auth()->user()->id);
    }
}
