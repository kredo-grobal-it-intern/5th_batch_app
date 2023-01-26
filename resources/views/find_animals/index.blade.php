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
                    <label for="Classfication" class="classfication">Classfication</label>
                    <label for="Target_Area" class="target_area">Target Areas</label>

             {{-- Search category --}}
                <div class="category_fileter">
                 <form  action="{{ route('find_animal.category_search') }}">
                        <select class="col-form-select form-select-sm" aria-label=".form-select-sm example" id="category" name="category">
                            @foreach(config('category') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="apply_category">Apply Fillter</button>
                 </form>
                </div>

              {{-- Select area--}}
               <div class="animal_search">
                    <form  action="{{ route('find_animal.search_area') }}">
                        <select class="col-form-select form-select-sm" aria-label=".form-select-sm example" id="area" name="area">
                            @foreach(config('pref') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="apply_area">Apply Fillter</button>
                    </form>
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

