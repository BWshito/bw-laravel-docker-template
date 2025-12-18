<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // コンストラクタインジェクション
    private $todo;

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
    public function store(Request $request)
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
    public function update(Request $request, $id)
    {
        $inputs = $request->all();

        $todo = $this->todo->findOrFail($id);
        $todo->content = $inputs['content'];
        $todo->save();

        return redirect()->route('todo.show', $todo->id);
    }
}