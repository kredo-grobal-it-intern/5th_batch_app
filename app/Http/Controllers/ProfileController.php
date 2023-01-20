<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    const LOCAL_STORAGE_FOLDER = 'public/avatars/';

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.profile.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $user = $this->user->findOrFail($id);

        // return view('users.profile.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->introduction = $request->introduction;

        if ($request->avatar) :
            if ($user->avatar) :
                $this->deleteAvatar($user->avatar);
            endif;

            $user->avatar = $this->saveImage($request);
        endif;

        $user->save();

        return redirect()->route('profile.show', $id);
    }

    public function saveImage($request)
    {
        $image_name = time() . "." . $request->avatar->extension();
        $request->avatar->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    public function deleteAvatar($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;

        if (Storage::disk('local')->exists($image_path)) :
            Storage::disk('local')->delete($image_path);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function followers($id)
    {

        $user  = $this->user->findOrFail($id);

        return view('users.profile.followers')->with('user', $user);
    }

    public function following($id)
    {
        $user = $this->user->findOrFail($id);

        return view('users.profile.following')->with('user', $user);
    }
}
