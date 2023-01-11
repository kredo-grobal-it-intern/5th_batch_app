<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User_inputController extends Controller
{
    public function __construct(User_input $user_input)
    {
        $this->users = $user_input;
    }

    public function input_user(Request $request, $id)
    {
        $request->validate([
            'username'  =>      'required|min:1|max:1000',
        ]);

            // $this->users->id = Auth::user()->id;
            // $this->users->name = $request->name;
            // $this->users->email = $request->email;
            // $this->users->password = $request->password;
            // $this->users->username = $request->username;
            // $this->users->gender = $request->gender;
            // $this->users->birthdate = $request->birthdate;
            // $this->users->prefecture = $request->prefecture;
            // $this->users->address = $request->address;
            // $this->users->street_address = $request->street_address;
            // $this->users->postcode = $request->postcode;
            // $this->users->room_num = $request->room_num;



        $user       = $this->users->findOrFail($id);
        $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        $user->gender = $request->gender;
        $user->username = $request->username;
        $user->birthdate= $request->birthdate;
        $user->prefecture = $request->prefecture;
        $user->address = $request->address;
        $user->street_address = $request->street_address;
        $user->postcode = $request->postcode;
        $user->phone = $request->phone;
        $user->room_num = $request->room_num;

        // $this->users->save();
        $user->save();

        return redirect()->route('find_animal.confirm', $id);
    }

    public function confirm($id)
    {
        $user = $this->users->findOrFail($id);
        // $publication = $this->pet->findOrFail($id);

        return view('find_animals.confirm')
        ->with('user',$user);
        // ->with('publication',$publication);
    }
}
