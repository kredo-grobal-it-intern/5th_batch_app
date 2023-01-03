@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/find_help_animal.css') }}">
@endsection

@section('content')

<div class="find_search mx-auto">
        {{-- Search keyword --}}
        <div class="mb-3">
         <form class="form-inline" action="{{ route('find_animal.search') }}">
          <input type="text" name="key" class="form-control col" id="keyword" aria-describedby="keyword-search" placeholder="Search keyword here...">
          <button type="submit" class="search_button">Search</button>
        </form>
        </div>


        {{-- Fillter by --}}
        <label for="Filler" class="h5">Filter by:</label>
        {{-- Select area  --}}
        <div class="row g-3 align-items-center">
            <div class="col-auto">
              <label for="Classfication" class="col-form-label text-dark">Classfication</label>
              <label for="Classfication" class="col-form-label text-dark mx-4">Target Areas</label>
            </div>
        </div>
            {{-- Select classfication--}}
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <select class="col-form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>All</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
             {{-- Select area--}}
                <select class="col-form-select form-select-sm  mx-5" aria-label=".form-select-sm example">
                    <option selected>All</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                {{-- Apply Filter --}}
                <button type="submit" class="apply_fillter">Apply Fillter</button>
          </div>
        </div>
    </div>

        <div class="row mx-auto w-75 pet">
            @forelse ($all_publications  as $publication)
                  <div class="col-3">
                      <div class="card my-2">
                          <div class="card-heade">
                              <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="card-img-top">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col h3"><a href="{{ route('find_animal.find_animal.show', $publication->id) }}">{{ $publication->name}}</a></div>
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
</div>


@endsection
