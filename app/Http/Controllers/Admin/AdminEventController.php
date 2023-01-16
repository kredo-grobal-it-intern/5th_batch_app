<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dog;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;

class AdminEventController extends Controller
{
    // イベント一覧画面
    public function index()
    {
        $events = Event::latest('updated_at')->paginate(10);
        return view('admin.events.index', ['events' => $events]);
    }

    // event投稿画面
    public function create()
    {
        $categories = eventCategory::all();
        $dogs = Dog::all();
        return view('admin.events.create', ['categories' => $categories, 'dogs' => $dogs]);
    }

    // event投稿処理
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('events', 'public'); // eventsディレクトリ内
        $event = new Event($validated); // 検証済みのデータを指定
        $event->category()->associate($validated['category_id']);
        $event->save();
        $event->dogs()->attach($validated['dogs']);

        return redirect()->route('admin.events.index')->with('success', 'Event posted.');
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

    // 指定したIDのeventの編集画面
    public function edit(Event $event)
    {
        $categories = EventCategory::all();
        $dogs = Dog::all();
        return view('admin.events.edit', ['event' => $event, 'categories' => $categories, 'dogs' =>$dogs]);
    }

    // 指定したIDのeventの更新処理
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
        // $eventインスタンスのeventCategoryメソッドに続けてassociateメソッドを呼び出し、引数には検証済みのcategory_idを指定する
        // 1対多のリレーションデータの更新
        $event->eventCategory()->associate($updateData['category_id']);
        // 送信されたデータではなくバリデーション済みのデータから取得
        // 多対多のリレーションデータの更新
        // $event->dogs()->sync($request->validated('dogs', []));　can't get [] data
        $event->dogs()->sync($request->validated()['dogs']); //
        $event->update($updateData);

        return redirect()->route('admin.events.index')->with('success', 'Events have been updated.');
    }

    // 指定したIDのeventの削除処理
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        Storage::disk('public')->delete($event->image);

        return redirect()->route('admin.events.index')->with('success', 'Event has been deleted.');
    }
}
