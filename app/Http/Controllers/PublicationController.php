<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{

    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $publication;

    public function __construct(Publication $publication)
    {
        $this->pet = $publication;
    }

    public function index()
    {
        return view('publications.index');
    }

    public function input()
    {
        return view('publications.input');
    }

    public function request(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:1|max:1000',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:1048',
            'date_of_brith'  => 'required',
            'breed'  => 'required',
            'weight'  => 'required',
            'gender'  => 'required',
            'url'  => 'required',
            'pet_type'  => 'required',
            'netured_status'  => 'required',
            'charateristic'  => 'required',
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

         return redirect()->route('publication.confirm');
        // return redirect()->back();
        // return view('publications.show');
    }

    public function saveImage($request)
    {
        if ($request->image) {
            $image_name = time().".".$request->image->extension();
            $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

            return $image_name;
        } else {
            return null;
        }
    }

    public function show($id)
    {
        $publication = $this->pet->findOrFail($id);

        return view('publications.show')
              ->with('publication', $publication);
    }

    public function edit($id)
    {
        $publication = $this->pet->findOrFail($id);

        if ($publication->user->id != Auth::user()->id) {
            return redirect()->back();
        }

        return view('publications.edit')->with('publication', $publication);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|min:1|max:1000',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:1048',
            'date_of_brith'  => 'required',
            'breed'  => 'required',
            'weight'  => 'required',
            'gender'  => 'required',
            'url'  => 'required',
            'pet_type'  => 'required',
            'netured_status'  => 'required',
            'charateristic'  => 'required',
        ]);

        $publication       = $this->pet->findOrFail($id);
        $publication->name = $request->name;
        $publication->date_of_brith = $request->date_of_brith;
        $publication->breed = $request->breed;
        $publication->weight = $request->weight;
        $publication->gender = $request->gender;
        $publication->url = $request->url;
        $publication->pet_type = $request->pet_type;
        $publication->netured_status = $request->netured_status;
        $publication->charateristic = $request->charateristic;

        #If there is a new image.......
        if ($request->image) {
            #Delete the previous image from the local storage
            $this->deleteImage($publication->image);

            #Move the new image to local storage
            $publication->image = $this->saveImage($request);
        }

        $publication->save();
        return redirect()->route('publication.show', $id);
    }

    private function deleteImage($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;
        //$image_path = "/public/images/filename.jpg";

        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }

    public function confirm()
    {
        // $all_publications = $this->pet->latest()->get();
        // $all_publications = $this->pet->findOrFail($id);
        // $all_publications  = Publication::all()->first();
        $all_publications = DB::table('pets')->simplePaginate(4);

        return view('publications.confirm')
                ->with('all_publications', $all_publications);
    }

    public function destroy($id)
    {
        $publication = $this->pet->findOrFail($id);
        $this->deleteImage($publication->image);
        //$this->deleteImage(filename.jpg);

        $this->pet->destroy($id);

        $all_publications = $this->pet->latest()->get();

        return view('publications.confirm')
           ->with('all_publications', $all_publications);
        ;
    }

    public function completed()
    {
        return view('publications.completed');
    }
}
