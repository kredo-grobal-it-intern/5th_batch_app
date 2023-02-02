@extends('layouts.app')


@section('title', 'followings')

@section('content')

    @include('users.profile.header')

<div class="container">
    <div style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-4">
                <h3 class="text-muted text-center">Following</h3>

                @if ($user->following->isNotEmpty())
                    <div class="row align-items-center mt-3">
                        @foreach ($user->following as $following)
                            <div class="col-auto">
                                <a href="">
                                    @if ($following->following->avatar)
                                        <img src="{{ asset('storage/avatars/' . $following->following->avatar) }}"
                                            class="rounded-circle avatar-sm" alt="">
                                    @else
                                        {{-- <img src="{{ asset('/storage/images/resources/initial_icon.png') }}" class="fa-solid d-block float-end icon-lg" alt="icon"> --}}
                                        <img src="{{ asset('/assets/images/animal_lover.png') }}" class="fa-solid d-block float-end icon-lg" alt="icon">
                                    @endif
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href="#" class="text-decoration-none text-dark fw-bold">
                                    {{ $following->following->name }}
                                </a>
                            </div>
                            <div class="col-auto text-end">
                                @if ($following->following->id != Auth::id() AND $following->following->isFollowed())
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
                    <h3 class="text-muted text-center mt-5">No followings yet</h3>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
