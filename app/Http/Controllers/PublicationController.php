<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{

    const LOCAL_STORAGE_FOLDER = 'public/images/';

    public function index()
    {
        return view('publications.index');
    }

    public function input()
    {
        $prefs = config('pref');
        return view('publications.input')->with(['prefs' => $prefs]);
    }

    public function request(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:1|max:1000',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:1048'
        ]);
        // saving the pet in the post table
        Publication::create([
            "user_id" => Auth::id(),
            "name"  => $request->name,
            "date_of_brith" => $request->date_of_brith,
            "breed" => $request->breed,
            "weight" => $request->weight,
            "gender" => $request->gender,
            "url" => $request->url,
            "pet_type" => $request->pet_type,
            "netured_status" => $request->netured_status,
            "vaccination_status" => $request->vaccination_status,
            "charateristic" => $request->charateristic,
            "area" => $request->area,
            "image" => self::saveImage($request),

        ]);
         return redirect()->route('publication.confirm');
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
        $publication = Publication::findOrFail($id);

        return view('publications.show')
              ->with('publication', $publication);
    }

    public function edit($id)
    {
        $publication = Publication::findOrFail($id);

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
            'area'  => 'required',
        ]);

        $publication = Publication::findOrFail($id);
        $publication->name = $request->name;
        $publication->date_of_brith = $request->date_of_brith;
        $publication->breed = $request->breed;
        $publication->weight = $request->weight;
        $publication->gender = $request->gender;
        $publication->url = $request->url;
        $publication->pet_type = $request->pet_type;
        $publication->netured_status = $request->netured_status;
        $publication->charateristic = $request->charateristic;
        $publication->area = $request->area;

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

        $all_publications = Publication::latest()->get();

        return view('publications.confirm')
                ->with('all_publications', $all_publications);
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $this->deleteImage($publication->image);

        $publication->destroy($id);

        $all_publications = Publication::latest()->get();

        return view('publications.confirm')
           ->with('all_publications', $all_publications);
        ;
    }

    public function completed()
    {
        return view('publications.completed');
    }
}
