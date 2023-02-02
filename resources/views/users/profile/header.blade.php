<div class="container">
<div class="row">
    <div class="col-4">
        @if ($user->avatar)
            <img src="{{ asset('/storage/avatars/'.$user->avatar) }}" alt="" class="rounded-circle d-block float-end avatar-lg" width="90px" height="90px">
        @else
            {{-- <img src="{{ asset('/storage/images/resources/initial_icon.png') }}" class="fa-solid d-block float-end icon-lg" alt="icon"> --}}
            <img src="{{ asset('/assets/images/animal_lover.png') }}" class="fa-solid d-block float-end icon-lg" alt="icon">
        @endif
    </div>

    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">
                    {{ $user->name }}
                </h2>
            </div>
            <div class="col-auto p-2">
                @if (Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit',$user->id) }}" class="btn btn-outline-secondary btn-sm fw-bold">Edit Profile</a>
                @else
                    <form action="#" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                <a href="{{ route('profile.show',$user->id) }}" class="text-decoration-none text-dark">
                    {{-- <strong>{{  $user->posts->count()  }}</strong> {{ ($user->posts->count() > 1 ? "Posts" : "Post" ) }} --}}
                    <strong>0</strong> Post
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('profile.followers',$user->id) }}" class="text-decoration-none text-dark">
                    <strong>{{ $user->followers->count() }}</strong> {{ ($user->followers->count() > 1 ? "Followers" : "Follower" ) }}
                    {{-- <strong>0</strong> Follower --}}
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('profile.following',$user->id) }}" class="text-decoration-none text-dark">
                    <strong>{{ $user->following->count() }}</strong> Following
                    {{-- <strong>0</strong> Following --}}
                </a>
            </div>
        </div>
        <p class="fw-bold">{{ $user->introduction }}</p>
    </div>
</div>
</div>
