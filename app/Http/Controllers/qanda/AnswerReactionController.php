<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerReactionController extends Controller
{
    public function index()
    {
    }

    public function show($id)
    {
        $answer = Answer::findOrFail($id);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $answer = Answer::findOrFail($request->answer_id);
        if (!$answer->userReaction()) {
            $answer->answerReactions()->attach(Auth::id());
            return response()->json([
                "message" => "Horray! Reaction has been made"
            ], 200);
        }

        return response()->json([
            "message" => "Oops! Failed to react!"
        ], 500);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

        $answer = Answer::find($id);

        if ($answer->userReaction()) {
            $answer->answerReactions()->detach(Auth::id());
            return response()->json([
                "message" => "We successfully removed your reaction!"
            ], 200);
        }

        return response()->json([
            "message" => "Sorry! We can't removed your reaction."
        ], 500);
    }
}
