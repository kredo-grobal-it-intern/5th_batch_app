<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;

class AdminEventsController extends Controller
{
    // イベント一覧画面
    public function index()
    {
        $events = Event::latest('updated_at')->paginate(10);
        return view('admin.events.index', ['events' => $events]);
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

    // 指定したIDのブログの編集画面
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', ['event' => $event]);
    }

    // 指定したIDのブログの更新処理
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $updateData = $request->validated();

        // 画像を変更する場合
        if ($request->has('image')) {
            // 変更前の画像削除
            Storage::disk('public')->delete($event->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('events', 'public');
        }
        $event->update($updateData);

        return redirect()->route('admin.events.index')->with('success', 'ブログを更新しました');
    }

    // 指定したIDのブログの削除処理
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        Storage::disk('public')->delete($event->image);

        return redirect()->route('admin.events.index')->with('success', 'ブログを削除しました');
    }
}
