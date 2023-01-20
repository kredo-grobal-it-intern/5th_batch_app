@extends('layouts.app')
@section('title', 'Profile')

@section('content')
    @include('users.profile.header')

    <div style="margin-top: 100px">
        @if ($user->posts->isNotEmpty())
            <div class="row">
                @foreach ($user->posts as $post)
                    <a href="">
                        <img src="{{ asset('/storage/images/'.$post->image) }}" style="height: 250px" alt="">
                    </a>
                @endforeach
            </div>
        @else
            <h3 class="text-muted text-center">No posts yet</h3>
        @endif
    </div>
@endsection
