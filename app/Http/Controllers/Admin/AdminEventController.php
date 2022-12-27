<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;

class AdminEventsController extends Controller
{
    // イベント一覧画面
    public function index()
    {
        return view('admin.events.index');
    }

    // ブログ投稿画面
    public function create()
    {
        return view('admin.events.create');
    }

    // ブログ投稿処理
    public function store(StoreEventRequest $request)
    {
        $savedImagePath = $request->file('image')->store('events', 'public');
        $event = new Event($request->validated()); // 検証済みのデータを指定
        $event->image = $savedImagePath; // 個別に指定
        $event->save(); // データベースへの追加

        // return to_route('admin.events.index')->with('success', 'イベントを登録しました');
        return redirect()->route('admin.events.index')->with('success', 'イベントを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
