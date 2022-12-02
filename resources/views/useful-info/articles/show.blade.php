@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')


<div class="container text-center">
    <div class="row">
        <div class="">
            <h1 class="fw-bolder d-inline" style="font-size: 4rem;">{{ $article->title }}</h1>
            <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark fs-1 float-end mt-3"></i></a>
        </div>
    </div>

    <div class="row  mt-5 ">
        <div class="col-5  p-0">
            {{-- <img src="{{asset('')}}" alt=""> --}}
            <div class="bg-secondary w-100" style="height: 400px;">
                {{ $article->image }} <br>
                image will be here
            </div>
            <p class="text-end">
                created at: {{ $article->created_at }} <br>
                updated at: ~hours ago <br>
                written by: Michael Jordan
            </p>
           
            {{-- {{ $article->updated_at->diffForHumans() }} --}}

{{-- if 記載予定（article 書いた本人なら以下のボタンが出る） --}}
            <div class="">
                <a href="{{ route('article.edit', $article) }}" type="button" class="btn btn-warning float-start col-5">Edit</a>
                
                <button type="button" class="btn btn-danger float-end col-5" data-mdb-toggle="modal" data-mdb-target="#delete-article-{{$article->id }}">Delete</button>
            </div>
            @include('useful-info.articles.modal.delete')
            <!-- Button trigger modal -->
        </div>
        <div class="col-1"></div>
        <div class="col-6 bg-warning">
            <div class="">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, non ad. Quas iure perferendis maiores consectetur odio distinctio optio, incidunt blanditiis? Eligendi vel distinctio totam magni nisi, voluptate, commodi nemo odit consectetur et obcaecati dolorem non neque amet quaerat veritatis aut accusantium. Veritatis, aut sequi. Dolorem similique perspiciatis blanditiis temporibus hic accusamus sit quasi pariatur perferendis natus, necessitatibus consectetur sunt beatae veritatis voluptate, dignissimos veniam iure. Fugiat esse doloremque earum ipsum molestiae iste. Natus voluptatum laborum consectetur! Ipsum velit corrupti, tenetur saepe autem at. Beatae eaque quis vero praesentium harum numquam aliquam magni enim minus obcaecati, ad optio, nulla impedit.
            </div>
        </div>
        <a href="{{ route('article.index') }}" class="fs-4 w-50 text-decoration-none mt-5 mx-auto">Back</a>
    </div>
</div>
@endsection