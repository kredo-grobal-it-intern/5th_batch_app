<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnswerReaction;
use Illuminate\Support\Facades\Auth;

class AnswerReactionController extends Controller
{
    // private $answer_reaction;

    // public function __construct(AnswerReaction $answer_reaction)
    // {
    //     $this->answer_reaction = $answer_reaction;
    // }


    public function store(Request $request)
    {
        // $this->answer_reaction->liked_by = Auth::id();
        // $this->answer_reaction->answer_id = $request->id;

        // $this->answer_reaction->save();

        AnswerReaction::create([
            "like_by" => Auth::id(),
            "answer_id" => $request->id
        ]);

        return redirect()->back();
    }


    // public function destroy($id)
    // {
    //     $this->answer_reaction->where('liked_by', Auth::id())
    //                             ->where('answer_id', $id)->delete();
    //     return redirect()->back();
    // }

    public function destroy(AnswerReaction $answer_reaction) {
        $answer_reaction->where('liked_by', Auth::id())->delete();
    }
}
