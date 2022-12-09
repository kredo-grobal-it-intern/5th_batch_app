<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionReaction;
use Illuminate\Support\Facades\Auth;

class QuestionReactionController extends Controller
{
    private $question_reaction;

    public function __construct(QuestionReaction $question_reaction)
    {
        $this->question_reaction = $question_reaction;
    }


    public function store(Request $request)
    {
        //
        $this->question_reaction->liked_by = Auth::user()->id;
        $this->question_reaction->question_id = $request->id;

        $this->question_reaction->save();

        return redirect()->back();
    }


    public function destroy($id)
    {
        $this->question_reaction->where('liked_by', Auth::user()->id)
                                ->where('question_id', $id)->delete();
        return redirect()->back();
    }
}
