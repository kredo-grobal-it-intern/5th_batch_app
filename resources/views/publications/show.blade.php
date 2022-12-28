@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/show_pet_detail.css') }}">
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

   <div class="p_form">
    <div class="row mt-5">
        <div class="col">
            <img src="{{ asset('/storage/images/' . $publication->image) }}" alt="{{ $publication->image }}" class="w-75">
        </div>

        <div class="col">
            <button  type="submit" class="back_button" ><a href="{{ route('publication.confirm') }}" class="link-dark">Back</a></button>
             {{-- if the owner of the post is the Auth user, show Edit and Delete button --}}

            <button  type="submit" class="edit_button" ><a href="{{ route('publication.edit',$publication->id) }}" class="link-dark">Edit</a></button>

            <form action="{{ route('publication.destroy', $publication->id) }}" method="post" class="d-inline">
                @csrf {{-- cross site reference forgeries --}}
                @method('DELETE')

                <button type="submit" class="delete_button">Delete</button>
            </form>



                <div class="row my-1">
                    <div class="col">pet_name</div>
                    <div class="col">age</div>
                </div>
                <div class="row my-1">
                    {{-- name --}}
                    <div class="col h5">{{ $publication->name }}
                    </div>
                {{-- age --}}
                <div class="col h5">{{ $publication->date_of_brith }}
                </div>
                </div>

                <div class="row my-1">
                    <div class="col">breed</div>
                    <div class="col">weight</div>
                </div>
                <div class="row my-1">
                    {{-- breed --}}
                    <div class="col h5">{{ $publication->breed }}</div>
                {{-- weight --}}
                    <div class="col h5">{{ $publication->weight }}
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col">Gender</div>
                    <div class="col">Kind</div>
                </div>
                <div class="row my-1">
                    {{-- Gender --}}
                    <div class="col h5">{{ $publication->gender }}</div>
                    {{-- kind --}}
                    <div class="col h5">{{ $publication->pet_type }}</div>
                </div>

                <div class="row my-1">
                    <div class="col">Spaying</div>
                    <div class="col">Vaccine</div>
                </div>
                <div class="row my-1">
                    {{-- Spaying --}}
                    <div class="col h5">{{ $publication->netured_status }}</div>
                    {{-- Vaccine --}}
                    <div class="col h5">{{ $publication->vaccination_status }}</div>
                </div>

                <div class="row my-1">
                    {{-- Delivery Area --}}
                    <div class="col">Delivery Areas</div>
                    <div class="col">URL</div>
                </div>
                <div class="row my-1">
                    {{-- Delivery Area --}}
                    <div class="col"><select type="checkbox" class="form-control" name="area">
                        @foreach(config('pref') as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                    </div>
                    {{-- URL --}}
                    <div class="col h5">{{ $publication->url }}</div>
                </div>

                <label for="Characteristics" class="my-1">Characteristics</label>
            {{-- URL --}}
            <div class="h5">{{ $publication->url }}</div>
        </div>
      </div>
    </div>

@endsection
