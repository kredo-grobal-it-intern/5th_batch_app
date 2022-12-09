<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnswerComment;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerCommentController extends Controller
{
    private $answer_comment;

    public function __construct(AnswerComment $answer_comment)
    {
        $this->answer_comment = $answer_comment;
    }


    public function show($id)
    {
        $answer = Answer::findOrFail($id);
        $all_comments = $answer->comments()->paginate(10);

        return view('answer/comment/show')->with('answer', $answer)->with('all_comments', $all_comments);
    }


    public function store(Request $request)
    {
        $this->answer_comment->user_id = Auth::user()->id;
        $this->answer_comment->answer_id = $request->answer_id;
        $this->answer_comment->body = $request->comment;

        $this->answer_comment->save();

        return redirect()->back();

    }


    public function destroy(AnswerComment $answer_comment, $id)
    {
        $answer_comment = $this->answer_comment->findOrFail($id);
        $answer_comment->delete();

        return redirect()->back();
    }
}
