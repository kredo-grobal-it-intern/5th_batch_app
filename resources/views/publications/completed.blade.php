@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/completed_publication.css') }}">
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
        <div class="my-auto">✔</div>
    </div>
    <div class="circle_title_3">Complete</div>

     <div class="complete_message col-4">
        Congratulations Publication Completed!<br>
        Please check with Foster Home.
    </div>

         {{-- Back input --}}
          <button  type="submit" class="back_home"><a href="{{ route('animal_care.index') }}">Back to homepage</a></button>
    </form>



@endsection
