<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use App\Models\Save;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function index()
    {
        $saved = Save::where('user_id', Auth::id())->get();
        $keepNews = [];
        foreach($saved as $savedNews){
            $keepNews[] = $savedNews->news->id;
        }

        $old_news = News::whereDate('created_at', '<=', now()->subDays(3))->whereNotIn('id', $keepNews)->delete();



        $news_types = ['pet amusement','pet cafe', 'dog park', 'pet hospital'];
        foreach ($news_types as $news_type) {
            $response = Http::get(env('NEWS_API_ENDPOINT'), [
                'apiKey' => env('NEWS_API_KEY'),
                'q' => $news_type
            ]);

            if (isset($response->object()->articles) && !empty($response->object()->articles)) {
                foreach ($response->object()->articles as $article) {
                    News::create([
                        'title' => $article->title,
                        'description' => $article->description,
                        'author' => $article->author,
                        'image' => $article->urlToImage,
                        'url' => $article->url,
                        'news_type' => $news_type,
                        'created_at' => $article->publishedAt
                    ]);
                }
            }
        }
        
        
    
        $all_news = News::latest()->get();
        $amusement_news = News::latest()->where('news_type', 'pet amusement')->latest()->get()->take(4);
        $cafe_news = News::latest()->where('news_type', 'pet cafe')->latest()->get()->take(4);
        $dogrun_news = News::latest()->where('news_type', 'dog park')->latest()->get()->take(4);
        $hospital_news = News::latest()->where('news_type', 'pet hospital')->latest()->get()->take(4);

        // get data whose user_id = Auth user's id  from saves table (kinda filtering)
        $saved = Save::where('user_id', Auth::id())->get();
        
        return view('useful-info.index')->with('all_news', $all_news)
                                        ->with('amusement_news', $amusement_news)
                                        ->with('cafe_news', $cafe_news)
                                        ->with('dogrun_news', $dogrun_news)
                                        ->with('hospital_news', $hospital_news)
                                        ->with('saved', $saved);
        // return $response->object();
    }

    public function show($id)
    {
        
        $news = News::findOrFail($id);

        $bookmark = Save::latest()->where('user_id', Auth::id())->first();
        return view('useful-info.articles.show')->with('news', $news)
                                                ->with('bookmark', $bookmark);
    }

    public function showAmusement()
    {
        $amusement_news = News::latest()->where('news_type', 'pet amusement')->paginate(8);

        return view('useful-info.all-articles.amusement')->with('amusement_news', $amusement_news);
    }

    public function showCafe()
    {
        $cafe_news = News::latest()->where('news_type', 'pet cafe')->paginate(8);

        return view('useful-info.all-articles.cafe')->with('cafe_news', $cafe_news);
    }

    public function showDogrun()
    {
        $dogrun_news = News::latest()->where('news_type', 'dog park')->paginate(8);

        return view('useful-info.all-articles.dogrun')->with('dogrun_news', $dogrun_news);
    }

    public function showHospital()
    {
        $hospital_news = News::latest()->where('news_type', 'pet hospital')->paginate(8);

        return view('useful-info.all-articles.hospital')->with('hospital_news', $hospital_news);
    }

    public function showSaved()
    {
        $saved_news = Save::latest()->where('user_id', Auth::id())->paginate(8);

        return view('useful-info.all-articles.saved')->with('saved_news', $saved_news);
    }

    public function search(Request $request)
    {
        
        $search = $request->search;

        $wordArraySearched = preg_split("/\s/", $search);

        // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
        foreach ($wordArraySearched as $value) {
            $all_results = News::where('title', 'like', '%'.$value.'%')
            ->orWhere('description', 'LIKE', '%'.$value.'%')
            ->paginate(8);
        }

        return view('useful-info.articles.result')->with('all_results', $all_results);
    }
}
