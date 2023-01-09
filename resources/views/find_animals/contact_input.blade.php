@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/find_contact_input.css') }}">
@endsection

@section('content')

    <div class="row mt-5">
        <div class="col-4">
            <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="w-75">
            <div class="font_con">Registered Date:{{ $publication->created_at }}</div>
            <div class="font_con">Updated at:{{ $publication->updated_at }}</div>
        </div>

       <div class="col">

        <div class="title">
            Foster Parent Application and Inquiry Form
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

        {{-- input User information --}}
        <div class="u_form">
            <form action="{{ route('publication.request') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row my-1">
                  <div class="col">Name</div>
                  <div class="col">Accont Name</div>
              </div>
              <div class="row my-1">
                  {{-- Mail Address --}}
                  <div class="col"><input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus>
                      @error('name')
                          <p class="text-danger small">{{ $message }}</p>
                      @enderror
                  </div>
                 {{-- Confirm Mail Address  --}}
                  <div class="col"><input type="text" id="account_name" name="account_name" class="form-control" value="{{ old('date_of_brith') }}" autofocus>
                      @error('date_of_brith')
                          <p class="text-danger small">{{ $message }}</p>
                       @enderror
                  </div>
              </div>

              <div class="row my-1">
                  <div class="col">Gender</div>
                  <div class="col">Date of Brith</div>
              </div>
              <div class="row my-1">
                  {{-- gender --}}
                  <div class="col">
                    <select type="checkbox" name="gender" value="{{ old('gender') }}">
                        @foreach(config('pet_enum_gender') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                </div>
                 {{-- birthdate --}}
                  <div class="col"><input type="date" name="birthdate" id="birthdate" max="9999-12-31">
                      @error('weight')
                          <p class="text-danger small">{{ $message }}</p>
                       @enderror
                  </div>
              </div>

              <div class="row my-1">
                  <div class="col">Post Code</div>
                  <div class="col">Phone Number</div>
              </div>
              <div class="row my-1">
                   <div class="col">
                      {{-- Post Code --}}
                      <input type="text" name="postal_code" minlength="7" maxlength="8" pattern="\d*" autocomplete="shipping postal-code">
                  </div>
                  <div class="col">
                      {{-- Phone --}}
                     <input type="tel" name="example2" size="15" maxlength="15">
                  </div>
              </div>

              <div class="row my-1">
                  <div class="col">Address</div>
                  <div class="col">City/Street Adress</div>
              </div>
              <div class="row my-1">
                   <div class="col">
                      {{-- Address --}}
                      <input type="text" name="city" autocomplete="shipping address-level2">
                    </label>
                  </div>
                  <div class="col">
                      {{-- City/Street Adress --}}
                      <input type="text" name="address1" autocomplete="shipping address-line1">
                  </div>
              </div>

              <div class="row my-1">

                  <div class="col">Apartment/Building Name</div>
                  <div class="col">Prefecture</div>
              </div>
              <div class="row my-1">
                  <div class="col"><input type="text" name="address2" autocomplete="shipping address-line2"></div>
                  <div class="col"><select type="checkbox" class="form-control" id="area" name="area">
                    @foreach(config('pref') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                    @endforeach
                </select>
                </div>
              </div>

              <br>
              <button  type="submit" class="btn" style=" height: 40px;background:#FACA7B;;border-radius: 12px;">submit</button>
            </form>
         @endsection
