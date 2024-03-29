<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    // private $question;
    const LOCAL_STORAGE_FOLDER = 'public/images/questions';


    // public function __construct(Question $question){
    //     $this->question = $question;
    // }


    public function index(Request $request)
    {
        $all_questions = Question::latest()->paginate(20);

        $all_question_categories = QuestionCategory::all();

        $keyword = $request->input('keyword');
        $query = Question::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");

            $all_questions = $query->paginate(20);
        }

        // $category = $request->input('category[]');
        // foreach ($query->selectedCategories as $selected_category)

        // endforeach

        // if(!empty($category)) {
        //     $query->selectedCategories->where('category_id', $category);

        //     $all_questions = $query->paginate(20);
        // }

        return view('question/index')
                    ->with('all_questions', $all_questions)
                    ->with('all_question_categories', $all_question_categories)
                    ->with('keyword', $keyword);
    }

    public function show()
    {
    }


    public function create()
    {
        $all_question_categories = QuestionCategory::all();
        return view('question/create')->with('all_question_categories', $all_question_categories);
    }


    public function store(Request $request)
    {
        // Save without category
        // $this->question->title = $request->title;
        // $this->question->content = $request->content;
        // $this->question->image = $this->saveQuestionImage($request);
        // $this->question->user_id = Auth::id();
        // $this->question->save();

        $question = Question::create([
            "title" => $request->title,
            "content" => $request->content,
            "image" => self::saveQuestionImage($request),
            "user_id" => Auth::id(),
        ]);

        // save categories [1,2,3] -> [category_id => 1,category_id => 2,category_id => 3]
        foreach ($request->category as $category_id) {
            $question_category[] = ["category_id" => $category_id];
        }
        // $this->question->SelectedCategory()->createMany($question_category);
        $question->createSelectedCategory()->createMany($question_category);

        return redirect()->route('questions.index');
    }


    public function saveQuestionImage($request)
    {
        if ($request->image) {
            $image_name = time().".".$request->image->extension();
            $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

            return $image_name;
        } else {
            return null;
        }
    }


    public function deleteQuestionImage($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

        if (Storage::disk('local')->exists($image_path)) :
            Storage::disk('local')->delete($image_path);
        endif;
    }


    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->title = $request->title;
        $question->content = $request->content;
        $question->user_id = Auth::id();
        if ($request->image) :
            self::deleteQuestionImage($question->image);

            $question->image = self::saveQuestionImage($request);
        endif;
        $question->save();

        $question->createSelectedCategory()->delete(); // delete all previously selected categories

        foreach ($request->category as $category_id) {
            $question_category[] = ["category_id" => $category_id];
        }
        $question->createSelectedCategory()->createMany($question_category);

        return redirect()->route('questions.index');
    }


    public function destroy(Question $question)
    {
        // $question = $this->question->findOrFail($id);
        // $this->deleteQuestionImage($question->image);
        $question->delete();

        return redirect()->back();
    }
}
