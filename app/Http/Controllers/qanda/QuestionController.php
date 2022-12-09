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
    private $question;
    const LOCAL_STORAGE_FOLDER = 'public/images/questions';


    public function __construct(Question $question){
        $this->question = $question;
    }


    public function index()
    {
        $all_questions = Question::latest()->get();

        $all_question_categories = QuestionCategory::all();

        return view('qanda/index')
                    ->with('all_questions', $all_questions)
                    ->with('all_question_categories', $all_question_categories);
    }


    public function create()
    {
        $all_question_categories = QuestionCategory::all();
        return view('qanda.create')->with('all_question_categories', $all_question_categories);
    }


    public function store(Request $request)
    {
        // Save without category
        $this->question->title = $request->title;
        $this->question->content = $request->content;
        $this->question->image = $this->saveQuestionImage($request);
        $this->question->user_id = Auth::id();
        $this->question->save();

        // save categories [1,2,3] -> [category_id => 1,category_id => 2,category_id => 3]
        foreach($request->category as $category_id){
            $question_category[] = ["category_id"=>$category_id];
        }
        // $this->question->SelectedCategory()->createMany($question_category);
        $this->question->createSelectedCategory()->createMany($question_category);

        return redirect()->route('Q-A.index');
    }


    public function saveQuestionImage($request){
        if ($request->image){
            $image_name = time().".".$request->image->extension();
            $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

            return $image_name;
        }else{
            return null;
        }
    }


    public function deleteQuestionImage($image_name){
        $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

        if(Storage::disk('local')->exists($image_path)):
            Storage::disk('local')->delete($image_path);
        endif;
    }


    public function update(Request $request, $id)
    {
        $question = $this->question->findOrFail($id);
        $question->title = $request->title;
        $question->content = $request->content;
        $question->user_id = Auth::id();
        if($request->image):
            $this->deleteQuestionImage($question->image);

            $question->image = $this->saveQuestionImage($request);
        endif;
        $question->save();

        $question->createSelectedCategory()->delete(); // delete all previously selected categories

        foreach($request->category as $category_id){
            $question_category[] = ["category_id"=>$category_id];
        }
        $question->createSelectedCategory()->createMany($question_category);

        return redirect()->route('Q-A.index');
    }


    public function destroy(Question $question, $id)
    {
        $question = $this->question->findOrFail($id);
        // $this->deleteQuestionImage($question->image);
        $question->delete();

        return redirect()->back();
    }
}
