@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/find_contact.css') }}">
@endsection

@section('content')

        <div class="pet_name">{{ $publication->name }}</div>
        <div class="row mt-5">
            <div class="col">
                <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="w-75">
                <div class="font_con">Registered Date:{{ $publication->created_at }}</div>
                <div class="font_con">Updated at:{{ $publication->updated_at }}</div>
            </div>

            <div class="col">
              <div class="confimation">
                 <div class="title mt-1 mx-2">Confimation</div>

                 <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      <p>We take good care of the animals we receive and do not neglect them</p>
                    </label>
                 </div>

                 <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <p>I will not provide false answers to the application questionnaire.</p>
                    </label>
                 </div>

                 <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <p>Not for resale or abuse.</p>
                    </label>
                 </div>

                 <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <p>Some membership information (area of residence, gender, and age group) will be disclosed to the recruiter. </p>
                    </label>
                 </div>

                 <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <p>At the time of transfer, sign, seal, and retain the transfer agreement.</p>
                    </label>
                 </div>

                 <div class="form-check m-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <p>I pledge to raise them with love and responsibility for the rest of my life.</p>
                    </label>
                 </div>

              </div>

              <p>To apply for a foster home or make an inquiry, you must agree to the Terms of Use.</p>

             <button  type="submit" class="contact_button"  style=" height: 40px;background:#FACA7B;;border-radius: 12px;"><a href="{{ route('find_animal.contact_input',$publication->id) }}" class="link-dark">Contact</a></button>

            </div>
      </form>
    </div>
@endsection
