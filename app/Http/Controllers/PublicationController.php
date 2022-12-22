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
    const LOCAL_STORAGE_FOLDER = 'public/images/';

    public function __construct(Publication $publication)
    {
        $this->pet = $publication;
    }

    public function index()
    {
        return view('publications.index');
    }

    public function request(Request $request)
    {
        $request->validate([
            'name'  =>      'required|min:1|max:1000',
            'image' =>      'required|mimes:jpg,jpeg,png,gif|max:1048'
        ]);
        // saving the pet in the post table
         $this->pet->user_id = Auth::user()->id;
         $this->pet->name = $request->name;
         $this->pet->date_of_brith = $request->date_of_brith;
         $this->pet->breed = $request->breed;
         $this->pet->weight = $request->weight;
         $this->pet->gender = $request->gender;
         $this->pet->url = $request->url;
         $this->pet->pet_type = $request->pet_type;
         $this->pet->netured_status = $request->netured_status;
         $this->pet->vaccination_status = $request->vaccination_status;
         $this->pet->charateristic = $request->charateristic;
         $this->pet->image = $this->saveImage($request);

         $this->pet->save();

        return redirect()->back();
    }

    public function saveImage($request){
        if ($request->image){
            $image_name = time().".".$request->image->extension();
            $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

            return $image_name;
        }else{
            return null;
        }
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
