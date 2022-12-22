@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/input_pet_name.css') }}">
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

    <div class="circle_2">
        <div class="mx-auto">2</div>
    </div>

    <div class="circle_3">
        <div class="my-auto">3</div>
    </div>

    <div class="p_form">
      <form action="{{ route('publication.request') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row my-1">
            <div class="col">pet_name</div>
            <div class="col">age</div>
        </div>
        <div class="row my-1">
            {{-- name --}}
            <div class="col"><input type="text" name="name" id="name" class="form-control" autofocus>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
           {{-- age --}}
            <div class="col"><input type="number" id="date_of_brith" name="date_of_brith" class="form-control"autofocus>
                @error('age')
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
            <div class="col"><input type="text" name="breed" id="breed" class="form-control" autofocus>
                @error('breed')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
           {{-- age --}}
            <div class="col"><input type="text" id="weight" name="weight" class="form-control"autofocus>
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
                <select type="checkbox" name="gender">
                @foreach(config('pet_enum_gender') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
                {{-- kind --}}
                <select type="checkbox" name="pet_type">
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
                <select type="checkbox" name="netured_status">
                @foreach(config('pet_enum_spaying') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            </div>
            <div class="col">
                {{-- Vaccine --}}
                <select type="checkbox" name="vaccination_status">
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
            <div class="col"><input type="text" class="form-control" id="url" name="url" required></div>
        </div>

         <label for="Characteristics" class="my-1">Characteristics</label>
        <textarea id="charateristic" name="charateristic"
          rows="5" class="form-control"></textarea>

        <label for="UploadImage" class="my-1">UploadImage</label>

        <input type="file" id="image" name="image" class="form-control">

        <br>
        <button  type="submit" class="btn" style=" height: 40px;background:#FACA7B;;border-radius: 12px;">submit</button>
      </form>
    </div>



@endsection
