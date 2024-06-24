<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {

        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only('content');
        Todo::create($todo);
        return redirect('/')->with('message','todoを作成しました');
    }

    public function update(TodoRequest $request)
    {

        $data = $request->only('content');
        Todo::find($request->id)->update($data);
        return redirect('/')->with('message' , 'Todoを更新しました');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message' , 'Todoを削除しました');

    }
}
