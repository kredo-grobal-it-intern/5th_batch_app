<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_input;

class User_inputController extends Controller
{
    public function __construct(User_input $user_input)
    {
        $this->user = $user_input;
    }

    public function input_user(Request $request, $id)
    {
        $request->validate([
                'username'  => 'required|min:1|max:1000',
        ]);

        $user       = $this->user->findOrFail($id);
        $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        $user->gender = $request->gender;
        $user->username = $request->username;
        $user->birthdate = $request->birthdate;
        $user->prefecture = $request->prefecture;
        $user->address = $request->address;
        $user->street_address = $request->street_address;
        $user->postcode = $request->postcode;
        $user->phone = $request->phone;
        $user->room_num = $request->room_num;

        // $this->users->save();
        $user->save();
        return redirect()->route('user_input.confirm', $id);
    }

    public function confirm($id)
    {
        $user = $this->user->findOrFail($id);
        // $publication = $this->pet->findOrFail($id);

        return view('find_animals.confirm')
        ->with('user', $user);
        // ->with('publication',$publication);
    }
}
