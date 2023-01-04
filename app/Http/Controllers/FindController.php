<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Find;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FindController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/';
    private $find;

    public function __construct(Find $find)
    {
        $this->pet = $find;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_publications = DB::table('pets')->simplePaginate(8);
        return view('find_animals.index')
                ->with('all_publications', $all_publications);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       //
    }

    public function show($id)
    {
        $publication = $this->pet->findOrFail($id);

        return view('find_animals.show')
                ->with('publication', $publication);
    }

    public function edit($id)
    {
        $publication = $this->pet->findOrFail($id);

        if($publication->user->id != Auth::user()->id){
            return redirect()->back();
        }

        return view('find_animals.edit')->with('publication',$publication);
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  =>      'required|min:1|max:1000',
            'image' =>      'required|mimes:jpg,jpeg,png,gif|max:1048',
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
        if ($request->image){
            #Delete the previous image from the local storage
            $this->deleteImage($publication->image);

            #Move the new image to local storage
            $publication->image = $this->saveImage($request);

        }

        $publication->save();

        return redirect()->route('find_animal.index');
    }

    private function deleteImage($image_name){
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;
        //$image_path = "/public/images/filename.jpg";

        if(Storage::disk('local')->exists($image_path)){
            Storage::disk('local')->delete($image_path);
        }
    }

    public function destroy($id)
    {
        $publications = $this->pet->findOrFail($id);
        $this->deleteImage($publications->image);
        //$this->deleteImage(filename.jpg);

        $this->pet->destroy($id);

        return redirect()->route('find_animal.index');
    }


    public function confirm()
    {
        return view('find_animals.confirm');
    }


    public function completed()
    {
        return view('find_animals.complete');
    }

    public function search(Request $request)
    {
        $key = $request->key;

        $query = Find::query();

        if (!empty($key)) {
            $query->where('name', 'like', '%' . $key . '%')->orWhere('pet_type', 'like', '%' . $key . '%')->orWhere('breed', 'like', '%' . $key . '%')->orWhere('weight', 'like', '%' . $key . '%')->orWhere('charateristic', 'like', '%' . $key . '%')->orWhere('netured_status', 'like', '%' . $key . '%')->orWhere('gender', 'like', '%' . $key . '%')->orWhere('date_of_brith', 'like', '%' . $key . '%');
        }

        $all_publications = $query->orderBy('created_at', 'desc')->paginate(8);
        return view('find_animals.index', compact('all_publications'));
    }

    public function category_search(Request $request)
    {
        $key = $request->category;

        $search_category = $request->input('category');


        $query = Find::query();

           if ($search_category!=null) {
            $query->where('pet_type', $search_category)->orWhere('gender', $search_category);
        }

        $all_publications = $query->orderBy('created_at', 'desc')->paginate(8);
        return view('find_animals.index', compact('all_publications'));
    }


}
