<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $all_comments = $post->comments()->paginate(10);

        return view('comment/show')->with('post', $post)->with('all_comments', $all_comments);
    }

    public function store(Request $request)
    {
        Comment::create([
            "user_id" => Auth::id(),
            "post_id" => $request->post_id,
            "body" => $request->comment
        ]);

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        // $answer_comment = $this->answer_comment->findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }
}
