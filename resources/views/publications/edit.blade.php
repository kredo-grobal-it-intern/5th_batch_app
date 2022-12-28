@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/publication_edit.css') }}">
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
    <div class="circle_title_2">Confimation</div>

    <div class="circle_3">
        <div class="my-auto">3</div>
    </div>
    <div class="circle_title_3">Complete</div>

    <div class="p_form">
      <form action="{{ route('publication.update', $publication->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row my-1">
            <div class="col">pet_name</div>
            <div class="col">age</div>
        </div>
        <div class="row my-1">
            {{-- name --}}
            <div class="col"><input type="text" name="name" id="name" class="form-control" value="{{ old('name', $publication->name) }}" autofocus>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
           {{-- age --}}
            <div class="col"><input type="number" id="date_of_brith" name="date_of_brith" class="form-control" value="{{ old('date_of_brith', $publication->date_of_brith) }}" autofocus>
                @error('date_of_brith')
                    <p class="text-danger small">{{ $message }}</p>
                 @enderror
            </div>
        </div>

        <div class="row my-1">
            <div class="col">breed</div>
            <div class="col">weight</div>
        </div>
        <div class="row my-1">
            {{-- name --}}
            <div class="col"><input type="text" name="breed" id="breed" class="form-control" value="{{ old('breed', $publication->breed) }}"  autofocus>
                @error('breed')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
           {{-- age --}}
            <div class="col"><input type="text" id="weight" name="weight" class="form-control" value="{{ old('weight', $publication->weight) }}" autofocus>
                @error('weight')
                    <p class="text-danger small">{{ $message }}</p>
                 @enderror
            </div>
        </div>

        <div class="row my-1">
            <div class="col">Gender</div>
            <div class="col">Kind</div>
        </div>
        <div class="row my-1">
             <div class="col">
                {{-- Gender --}}
                <select type="checkbox" name="gender" value="{{ old('gender', $publication->gender) }}" autofocus>
                @foreach(config('pet_enum_gender') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
                {{-- kind --}}
                <select type="checkbox" name="pet_type"  value="{{ old('pet_type', $publication->pet_type) }}" autofocus>
                    @foreach(config('pet_enum_kind') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row my-1">
            <div class="col">Spaying</div>
            <div class="col">Vaccine</div>
        </div>
        <div class="row my-1">
             <div class="col">
                {{-- Spaying --}}
                <select type="checkbox" name="netured_status" value="{{ old('netured_status', $publication->netured_status) }}" autofocus>
                @foreach(config('pet_enum_spaying') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
                {{-- Vaccine --}}
                <select type="checkbox" name="vaccination_status" value="{{ old('vaccination_status', $publication->vaccination_status) }}" autofocus>
                    @foreach(config('pet_enum_vaccine') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row my-1">
            {{-- 後でやる --}}
            <div class="col">Delivery Areas</div>
            <div class="col">URL</div>
        </div>
        <div class="row my-1">
            <div class="col"><select type="checkbox" class="form-control" name="area">
                @foreach(config('pref') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            </div>
            <div class="col"><input type="text" class="form-control" id="url" name="url"  value="{{ old('url',$publication->url) }}" autofocus></div>
        </div>

         <label for="Characteristics" class="my-1">Characteristics</label>
        <textarea id="charateristic" name="charateristic"
          rows="5" class="form-control" value="{{ old('charateristic',$publication->charateristic) }}" autofocus></textarea>

        <label for="UploadImage" class="my-1">UploadImage</label>
        <br>
        <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="w-25 img-thumbnail">
        <input type="file" id="image" name="image" class="form-control">
        Acceptable formats: jpeg, jpg, png, gif only<br>
        Maximum file size: 1048kb
        @error('image')
        <p class="text-danger small">{{ $message }}</p>
       @enderror
        <br>
        <button  type="submit" class="btn" style=" height: 40px;background:#FACA7B;;border-radius: 12px;">submit</button>
      </form>
    </div>
@endsection
