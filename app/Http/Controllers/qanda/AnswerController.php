<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    const LOCAL_STORAGE_FOLDER = 'public/images/answers';

    public function index(){

    }

    public function show($id)
    {
        // todo: make model binding work
        // $answer = Answer::find($id);

        $question = Question::findOrFail($id);
        // $question = $answer->question;
        $best_answer = $question->answers()->where('best_answer', 1)->first();
        $all_answers = $question->answers()->where('best_answer', null)->latest()->get();

        return view('answer/show')->with('all_answers', $all_answers)->with('question', $question)->with('best_answer', $best_answer);
    }


    public function store(Request $request)
    {
        // Save without category
        // $this->answer->body = $request->answer;
        // $this->answer->image = $this->saveAnswerImage($request);
        // $this->answer->user_id = Auth::id();
        // $this->answer->question_id = $request->question_id;
        // $this->answer->save();

        Answer::create([
            "body" => $request->answer,
            "image" => self::saveAnswerImage($request),
            "user_id" => Auth::id(),
            "question_id" => $request->question_id,
        ]);

        return redirect()->back();
    }


    public function saveAnswerImage($request){
        if ($request->image){
            $image_name = time().".".$request->image->extension();
            $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $image_name);

            return $image_name;
        }else{
            return null;
        }
    }


    // public function deleteAnswerImage($image_name){
    //     $image_path = self::LOCAL_STORAGE_FOLDER.$image_name;

    //     if(Storage::disk('local')->exists($image_path)):
    //         Storage::disk('local')->delete($image_path);
    //     endif;
    // }


    public function destroy(Answer $answer)
    {
        // $answer = $this->answer->findOrFail($id);
        // $this->deleteAnswerImage($answer->image);
        $answer->delete();

        return redirect()->back();
    }


    public function selectBestAnswer(Request $request, Answer $answer, $id)
    {
        $answer = $answer->findOrFail($id);

        $answer->best_answer = 1;
        $answer->update();

        return redirect()->back();
    }
}
