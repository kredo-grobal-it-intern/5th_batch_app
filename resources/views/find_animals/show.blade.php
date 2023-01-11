@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/show_find_animal.css') }}">
@endsection

@section('content')
   <div class="p_form">
    <div class="row mt-5">
        <div class="col">
            <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="w-75">
            <div class="font_con">Submitted by:{{ $publication->user->name }}</div>
            <div class="font_con">Registered Date:{{ $publication->created_at }}</div>
            <div class="font_con">Updated at:{{ $publication->updated_at }}</div>
        <br>
        <iframe width="350" height="300" src="{{ $publication->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture  web-share" allowfullscreen></iframe>
        </div>


        <div class="col">
            @if( ( $publication->user_id ) === ( Auth::user()->id ) )
                <button  type="submit" class="back_button" ><a href="{{ route('find_animal.index') }}" class="link-dark">Back</a></button>
                {{-- if the owner of the post is the Auth user, show Edit and Delete button --}}
                    <button  type="submit" class="edit_button" ><a href="{{ route('find_animal.find_animal.edit',$publication->id) }}" class="link-dark">Edit</a></button>

                    <form action="{{ route('find_animal.find_animal.destroy',$publication->id) }}" method="post" class="d-inline">
                        @csrf {{-- cross site reference forgeries --}}
                        @method('DELETE')

                        <button type="submit" class="delete_button">Delete</button>
                    </form>
            @else
            <button  type="submit" class="back_button" ><a href="{{ route('find_animal.index') }}" class="link-dark">Back</a></button>
            <button  type="submit" class="contact_button" ><a href="{{ route('find_animal.contact',$publication->id) }}" class="link-dark">Contact</a></button>
            @endif



                <div class="row my-1">
                    <div class="col font_con">pet_name</div>
                    <div class="col font_con">age</div>
                </div>
                <div class="row my-1">
                    {{-- name --}}
                    <div class="col h5">{{ $publication->name }}
                    </div>
                {{-- age --}}
                <div class="col h5">{{ $publication->date_of_brith }}
                </div>
                </div>

                <div class="row my-1">
                    <div class="col font_con">breed</div>
                    <div class="col font_con">weight</div>
                </div>
                <div class="row my-1">
                    {{-- breed --}}
                    <div class="col h5">{{ $publication->breed }}</div>
                {{-- weight --}}
                    <div class="col h5">{{ $publication->weight }}
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col font_con">Gender</div>
                    <div class="col font_con">Kind</div>
                </div>
                <div class="row my-1">
                    {{-- Gender --}}
                    <div class="col h5">{{ $publication->gender }}</div>
                    {{-- kind --}}
                    <div class="col h5">{{ $publication->pet_type }}</div>
                </div>

                <div class="row my-1">
                    <div class="col font_con">Spaying</div>
                    <div class="col font_con">Vaccine</div>
                </div>
                <div class="row my-1">
                    {{-- Spaying --}}
                    <div class="col h5">{{ $publication->netured_status }}</div>
                    {{-- Vaccine --}}
                    <div class="col h5">{{ $publication->vaccination_status }}</div>
                </div>

                <div class="row my-1">
                    {{-- Delivery Area --}}
                    <div class="font_con">Location prefecture</div>
                </div>
                <div class="row my-1">
                    {{-- Delivery Area --}}
                    <div class="h5">{{ $publication->area }}</div>
                </div>

                <div class="row my-1">
                    <div class="font_con">URL</div>
                </div>
                <div class="row my-1">
                    {{-- URL --}}
                    <div class="h5">{{ $publication->url }}</div>
                </div>

                <label for="Characteristics" class="my-1 font_con">Characteristics</label>
            {{-- charateristic --}}
            <div class="h5">{{ $publication->charateristic }}</div>
        </div>
      </div>
    </div>
    <div class="pet_name">{{ $publication->name }}</div>
    @endsection
