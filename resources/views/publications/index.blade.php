@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/careful.css') }}">
@endsection

@section('content')

    <div class="title col-4">
        Request for Publication
    </div>

    <div class="section-title">
        precautions
    </div>

    <div class="section-content">
      1. Users are responsible for the content of the messages they send to each other. The site management will not be involved in any way.
        <br>
     2. Please understand that it may take some time for us to reply to your message. Please understand this before using the site.
        <br>
     3. Please proceed with the transfer only after both the applicant and the listing party have agreed to all the conditions necessary for the transfer to be completed, including the transfer conditions, transfer costs, and delivery.
    </div>

    <div class="contain_background  col-7">
        <div class="contain_title m-2">
            Confirmation
        </div>

        <div class="form-check m-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Confirm one by one whether there are any differences in recognition of the breeding environment, the concept of breeding, transfer conditions, transfer costs, etc.
            </label>
          </div>

          <div class="form-check m-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Please use your best judgment when transferring a pet in order to prevent abuse.
            </label>
          </div>

          <div class="form-check m-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Since you are entrusting a companion animal to us, we should use prudent judgment in our decision making.
            </label>
          </div>

          <div class="form-check m-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Please visit us to deliver the property as much as possible when transferring it to us in order to confirm the environment in which it will be kept.
            </label>
          </div>

          <div class="form-check m-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Post your photo and recruit!
            </label>
          </div>
    </div>

    <div class="col-6 button_title">
        To apply for a foster home or make an inquiry, you must agree to the Terms of Use,
    </div>



    <button type="submit" class="button col-2"><a href="{{ route('publication.input') }}" class="link-dark">Apply Fillte</a></button>

@endsection
