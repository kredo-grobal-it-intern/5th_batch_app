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
      <form action="{{ route('publication.store_pet') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-7">pet_name</div>
            <div class="col-5">age</div>
        </div>
        <div class="row">
            <div class="col-7"><input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter title here" autofocus>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="col-5"><input type="number" id="age" name="age" required></div> --}}
        </div>

        {{-- <div class="row">
            <div class="col-7">Gender</div>
            <div class="col-5">Kind</div>
        </div>
        <div class="row">
            <div class="col-7"><input type="radio" name="gender" value="male">Male
                <input type="radio" name="example" value="Dog" checked>Female</div>
            <div class="col-5"> <input type="radio" name="kind" value="Cat">Cat
                <input type="radio" name="example" value="Dog" checked>Dog</div>
        </div> --}}

        {{-- spaying Vaccine --}}
        {{-- <div class="row">
            <div class="col-7">spaying</div>
            <div class="col-5">Vaccine</div>
        </div>
        <div class="row">
            <div class="col-7"><input type="radio" name="gender" value="male">Compeleted
                <input type="radio" name="example" value="Dog" checked>Not Yet</div>
                <div class="col-5"><input type="radio" name="gender" value="male">Compeleted
                    <input type="radio" name="example" value="Dog" checked>Not Yet</div>
        </div> --}}

           {{-- Belong --}}
        {{-- <div class="row">
            <div class="col-7">Belongs</div>
        </div>
        <div class="row">
            <div class="col-7"><input type="radio" name="gender" value="male">Individual
                <input type="radio" name="example" value="Dog" checked>Oraganaizaition</div>
        </div>

        <div class="row">
            <div class="col-7">Delivery Areas</div>
            <div class="col-5">URL</div>
        </div>
        <div class="row">
            <div class="col-7"><select type="checkbox" class="form-control" name="area">
                @foreach(config('pref') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            </div>
            <div class="col-5"><input type="text" id="age" name="age" required></div>
        </div> --}}

        {{-- <label for="Characteristics">Characteristics</label>
        <br>
        <input type="text">
        <br>
        <label for="UploadImage">UploadImage</label> --}}
           {{-- put image --}}
        <br>
        <button  type="submit" class="btn" style=" height: 40px;background:#FACA7B;;border-radius: 12px;">submit</button>
      </form>
    </div>



@endsection
