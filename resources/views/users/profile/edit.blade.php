@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('profile.update',$user->id) }}" class="bg-white shadow rounded-3 p-5 " method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <h2 class="h3 mb-3 fw-light text-muted">Update Profile</h2>
                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="#" class="img-thumbnail rounded-circle d-block mx-auto profile-avatar"
                                alt="">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-auto align-self-end">
                        <input type="file" name="avatar" id="" class="form-control form-control-sm mt-1">
                        <div class="form-text">
                            Acceptable formats: jpeg, jpg, png, gif only <br>
                            Max file size: 1048kb
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" id="" class="form-control"
                        value="{{ old('name', $user->name) }}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" name="email" id="" class="form-control"
                        value="{{ old('name', $user->email) }}" autofocus>
                </div>
                <div class="mb-3">
                    <label for="introduction" class="form-label fw-bold">Introduction</label>
                    <textarea name="introduction" id="" rows="5" class="form-control" placeholder="Describe yourself">{{ old('name', $user->introduction)}}</textarea>
                </div>

                <button type="submit" class="btn btn-warning px-5">Submit</button>
            </form>
        </div>
    </div>
@endsection
