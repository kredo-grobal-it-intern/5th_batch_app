<?php

namespace App\Http\Controllers\qanda;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionReaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionReactionController extends Controller
{
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
        $question = Question::findOrFail($request->question_id);
        if(!$question->userReaction()) {
            $question->questionReactions()->attach(Auth::id());
            return response()->json([
                "message" => "Horray! Reaction has been made"
            ], 200);
        }

        return response()->json([
            "message" => "Oops! Failed to react!"
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if($question->userReaction()) {
            $question->questionReactions()->detach(Auth::id());
            return response()->json([
                "message" => "We successfully removed your reaction!"
            ], 200);
        }

        return response()->json([
            "message" => "Sorry! We can't removed your reaction."
        ], 500);
    }
}
