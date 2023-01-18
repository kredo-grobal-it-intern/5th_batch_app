<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; # This is responsible for handling the authentication

class SaveController extends Controller
{

    private $save;

    public function __construct(Save $save)
    {

        $this->save = $save;
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
    public function store(Request $request, Save $save)
    {
        $data = $save->exists();
        if ($data) {
            $save->delete(Auth::user()->id);
        }
        $this->save->user_id = Auth::user()->id;
        $this->save->news_id = $request->news_id;
        $this->save->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function show(Save $save)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function edit(Save $save)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Save $save)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Save  $save
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->save->where('user_id', Auth::user()->id)->where('news_id', $id)->delete();
        //destroy : accept array ex) $this->destroy(1,2,3); =>it'll work
        //delete  : not accept array => findOrFail(), where()でまず消す対象を見つけなきゃいけない

        return redirect()->back();
    }
}
