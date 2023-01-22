<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
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
        $post = Post::findOrFail($request->post_id);
        if (!$post->userReaction()) {
            $post->postReactions()->attach(Auth::id());
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

        $post = Post::find($id);

        if ($post->userReaction()) {
            $post->postReactions()->detach(Auth::id());
            return response()->json([
                "message" => "We successfully removed your reaction!"
            ], 200);
        }

        return response()->json([
            "message" => "Sorry! We can't removed your reaction."
        ], 500);
    }
}
