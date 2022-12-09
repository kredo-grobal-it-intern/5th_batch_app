<?php

namespace App\Http\Controllers\qanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    private $answer;
    const LOCAL_STORAGE_FOLDER = 'public/images/answers';

    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }


    public function show($id)
    {
        $question = Question::findOrFail($id);
        $all_answers = $question->answers()->latest()->get();

        return view('answer/show')->with('all_answers', $all_answers);
    }


    public function store(Request $request)
    {
        // Save without category
        $this->answer->body = $request->answer;
        $this->answer->image = $this->saveAnswerImage($request);
        $this->answer->user_id = Auth::id();
        $this->answer->question_id = $request->question_id;
        $this->answer->save();

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


    public function destroy(Answer $answer, $id)
    {
        $answer = $this->answer->findOrFail($id);
        // $this->deleteAnswerImage($answer->image);
        $answer->delete();

        return redirect()->back();
    }
}
