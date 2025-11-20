<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 一覧画面に全てのToDoを表示する処理
    public function index()
    {
        $todo = new Todo(); //TodoModelをインスタンス化
        $todos = $todo->all();

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
        $inputs = $request->all(); //入力された全ての値の取得

        $todo = new Todo();
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }
}