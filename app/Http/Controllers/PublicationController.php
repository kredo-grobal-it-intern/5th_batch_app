<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    private $publication;

    public function __construct(Publication $publication)
    {
        $this->publication = $publication;
    }

    public function index()
    {
        return view('publications.index');
    }

    public function store_pet(Request $request)
    {
        $request->validate([
            'name'         => 'required',
        ]);

        // $pet=new Pet;
        // saving the pet in the post table
        // $this->pet->user_id = Auth::user()->id;
         $this->pet->name = $request->name;
        // $this->pet->gender = $request->gender;
        // $this->pet->pet_type = $request->pet_type;


        // $pet->user_id = Auth::user()->id;
        // $pet->name= $request->name;

        // $pet->save();

        $this->pet->save();

        return redirect()->back();
    }

    public function input()
    {
        return view('publications.input');
    }

    public function confirm()
    {
        return view('publications.index');
    }

    public function completed()
    {
        return view('publications.index');
    }
}
