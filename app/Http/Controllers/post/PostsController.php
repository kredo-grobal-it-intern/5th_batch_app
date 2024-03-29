<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/posts';

    public function index()
    {
        $all_posts = Post::latest()->get();
        // $all_comments = $post->comments()->paginate(3);

        return view('post/index')->with('all_posts', $all_posts);
    }

    public function search(Request $request)
    {
        $all_posts = Post::latest()->paginate(100);

        $tag = $request->input('tag');
        $query = Post::query();

        if(!empty($tag)) {
            $query->where('body', 'LIKE', "%#{$tag}%");

            $all_posts = $query->paginate(100);
        }

        return view('post/search')
                    ->with('all_posts', $all_posts)
                    ->with('tag', $tag);
    }

    public function create()
    {
        return view('post/create');
    }

    public function store(Request $request)
    {
        $question = Post::create([
            "body" => $request->body,
            "image" => self::savePostImage($request),
            "user_id" => Auth::id(),
        ]);

        return redirect()->route('posts.index');
    }

    public function savePostImage($request)
    {
        if ($request->image) {
            $images = $request->file('image');

            foreach ($images as $image) {
                $image_name = time().".".$image->extension();
                $image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);
            }

            return $image_name;
        } else {
            return null;
        }
    }

    public function deletePostImage($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

        if (Storage::disk('local')->exists($image_path)) :
            Storage::disk('local')->delete($image_path);
        endif;
    }

    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return view('post/show')->with('post',$post);
    }

    public function update(Request $request, $post)
    {
        $post = Post::find($request->post);
        $post->body = $request->body;
        $post->user_id = Auth::id();
        if ($request->image) :
            self::deletePostImage($post->image);

            $post->image = self::savePostImage($request);
        endif;

        $post->save();

        return redirect()->route('posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
