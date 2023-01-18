<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdminMail;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function sendMail(ContactRequest $request)
    {
        $validated = $request->validated();

        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // 登録処理(実際はメール送信などを行う)
        // Log::debug($validated['name'] . 'contacted us.');
        Mail::to('admin@example.com')->send(new ContactAdminMail($validated));
        // return to_route('contact.complete');
        // ↑ to_route = laravel9 function?
        return route('contact.complete');
    }

    public function complete()
    {
        return view('contact.complete');
    }
}
