@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/show_pet.css') }}">
@endsection

@section('content')

    <div class="title col-4 mx-5">
        Request for Publication
    </div>

    <div class="number_border">
    </div>
    <div class="circle_1">
      <div class="my-auto">1</div>
    </div>
    <div class="circle_title_1">Application</div>

    <div class="circle_2">
        <div class="mx-auto">2</div>
    </div>


    <div class="circle_3">
        <div class="my-auto">3</div>
    </div>
    <div class="circle_title_3">Complete</div>
    <div class="circle_title_2">Confimation</div>


    <div class="your_publication">
        Your Publication
    </div>

    <div class="row mx-auto w-75 pet">
      @forelse ($all_publications  as $publication)
            <div class="col-3">
                <div class="card my-2">
                    <div class="card-heade">
                        <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="card-img-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col h3"><a href="{{ route('publication.show', $publication->id) }}">{{ $publication->name}}</a></div>
                            </div>
                            <div class="row">
                                 <div class="col">{{ $publication->date_of_brith }} years old</div>
                            </div>
                            <div class="row">
                                <div class="col">Registerd: {{ $publication->created_at }}</div>
                            </div>

                        </div>
                    </div>
                 </div>
               </div>

    @empty
    <div style="margin-top: 100px">
    <h2 class="text-muted text-center">No publications yet.</h2>
    <p class="text-center">
        <a href="{{ route('publication.input') }}" class="text-decoration-none">Create a publications</a>
    </p>
    </div>

    @endforelse
    {{ $all_publications->links()}}
</div>

 {{-- Complete Publication --}}
  <button  type="submit" class="confirm_button " ><a href="{{ route('publication.completed') }}" class="link-dark">Conmplete</a></button>
  {{-- Back Button --}}
  <button  type="submit" class="back_button" ><a href="{{ route('publication.input') }}" class="link-dark">Back</a></button>


@endsection
