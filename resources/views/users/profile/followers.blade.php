@extends('layouts.app')


@section('title', 'Followers')

@section('content')

    @include('users.profile.header')

<div class="container">
    <div style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-4">
                <h3 class="text-muted text-center">Followers</h3>

                @if ($user->followers->isNotEmpty())
                    <div class="row align-items-center mt-3">
                        @foreach ($user->followers as $follower)
                            <div class="col-auto">
                                <a href="">
                                    {{-- @if ($follower->follower->avatar)
                                        <img src="{{ asset('/storage/avatars/' . $follower->follower->avatar) }}"
                                            class="rounded-circle avatar-sm" alt="">
                                    @else --}}
                                        <img src="{{ asset('/storage/images/resources/initial_icon.png') }}" class="fa-solid d-block float-end icon-lg" alt="icon">
                                    {{-- @endif --}}
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href="#" class="text-decoration-none text-dark fw-bold">
                                    {{ $follower->follower->name }}
                                </a>
                            </div>
                            <div class="col-auto text-end">
                                @if ($follower->follower->id != Auth::id() AND $follower->follower->isFollowed())
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="border-0 bg-transparent p-0 text-secondary btn-sm">Following</button>
                                    </form>
                                @else
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="border-0 bg-transparent p-0 text-primary btn-sm">Follow</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <h3 class="text-muted text-center">No Followers yet</h3>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
