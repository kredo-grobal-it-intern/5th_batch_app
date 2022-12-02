<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $article;
    const LOCAL_STORAGE_FOLDER = 'public/images/';



    public function __construct(Article $article){    // class Post の object化 / from Post.php 
        $this->article = $article;
    }

    public function index()
    {
        $all_articles = Article::latest()->get()->take(4);
    
        //     return view('post.index')->with('post', $post);
        return view('useful-info.index')->with('all_articles', $all_articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('useful-info.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->article->user_id = Auth::id();
        $this->article->title = $request->title;
        $this->article->body = $request->body;
        $this->article->image = $this->saveImage($request);
        // $this->article->location =  $request->location;          ⏪ column 作り忘れた
        $this->article->save();

        return redirect()->route('article.index');
    }

    public function saveImage($request){    //form から
        # To Overwriting
        $image_name = time() . "." . $request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

        return $image_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //     return view('post.index')->with('post', $post);
        return view('useful-info.articles.show')->with('article',$article);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('useful-info.articles.edit')->with('article',$article);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->title;
        $article->body = $request->body;
        if($request->image):
            $this->deleteImage($article->image);

            $article->image = $this->saveImage($request);
        endif;
        $article->save();

        return redirect()->route('article.show', $article);
    }

    public function deleteImage($image_name){
        $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

        if(Storage::disk('local')->exists($image_path)):
            Storage::disk('local')->delete($image_path);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
