<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    // コンストラクタインジェクション
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 一覧画面に全てのToDoを表示する処理
    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    // 新規作成画面を表示する処理
    public function create()
    {
        return view('todo.create');
    }

    // 新規作成画面で作成ボタンが押下されたときの処理
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    // 詳細ボタンが押下されたときの処理
    public function show($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    // 編集ボタンが押下されたときの処理
    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    // 更新ボタンが押下されたときの処理
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();

        $todo = $this->todo->find($id);
        
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.show', $todo->id);
    }

    // 削除ボタンが押下されたときの処理
    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();

        return redirect()->route('todo.index');
    }
}