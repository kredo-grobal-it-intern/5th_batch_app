@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')


<div class="container">
    <div class="row">
        <div class=" text-center">
            <h1 class="fw-bolder d-inline" style="font-size: 4rem;">Edit Article</h1>
        </div>
    </div>

    <div class="row mt-5">
        <form action="" method="post" class="col-7 mx-auto">
            @csrf
            @method('PATCH')
            <div class="row p-0">
                <div class="col">
                    <label for="image" class="form-label fw-bold mb-0">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <div class="form-text" style="font-size: 0.85rem;">
                        The acceptable formats are jpeg,jpm,png, and gif only. <br>
                        Max file size: 1048kb
                    </div>
                    
                    <label for="title" class="form-label fw-bold mb-0 mt-3">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$article->title}}" required>
                </div>

                <div class="col-1"></div>

                <div class="col">
                    <div class="bg-secondary" style="height: 180px;">previous image will be displayed here</div>
                </div>
            </div>
            
            <p class="text-center form-label fw-bold mt-5 mb-0">What type of establishment?</p>
            <div class=" d-flex justify-content-around">
                <div class="">
                    <label for="amusement_park">Amusement Park</label>
                    <input type="radio" name="location" id="amusement_park" class=" form-check-inline">
                </div>
                <div class="">
                    <label for="cafe">Cafe</label>
                    <input type="radio" name="location" id="cafe" class=" form-check-inline">
                </div>
                <div class="">
                    <label for="dogrun">Dogrun</label>
                    <input type="radio" name="location" id="dogrun" class=" form-check-inline">
                </div>
                <div class="">
                    <label for="hospital">Hospital</label>
                    <input type="radio" name="location" id="hospital" class=" form-check-inline">
                </div>
            </div>
            
            <div class="mt-3 p-0">
                <label for="body" class="form-label fw-bold mb-0">Body</label>
                <textarea name="description" id="body"  class="form-control" rows="10" required>{{$article->body}}</textarea>
            </div>

            <div class="mt-5">
                <button type="button" class="btn btn-warning float-start col-5">Update</button>

                <a href="{{ route('article.index') }}" type="button" class="btn btn-secondary float-end col-5">Cancel</a>
            </div>
        
        </form>
       
    </div>
</div>
@endsection