@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')

  
  @if(session('message'))
  <div class="success-msg">
    <div class="success-msg__text">
      {{ session('message')}}
    </div>
  </div>
  @endif
  
    @if($errors->any())
    <div class="error-msg">
      <ul>
        @foreach ($errors->all() as $error)
        <li class="error-msg__text"> {{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  
    

  <div class="todo">
    <form action="/todos" method="post" class="todo__create-form">
      @csrf
      <input type="text" name="content" class="todo__create-form-txt" >
      <button class="todo__create-form-btn">作成</button>
    </form>
    <div class="todo-list">
      <table class="todo-list__content">
        <th class="todo-list__header">Todo</th>
        @foreach($todos as $todo)
        <tr class="todo-list__row">
          <td class="todo-list__row-item">
            <form action="/todos/update" method="POST" class="update-form">
              @method('PATCH')
              @csrf
              <div class="update-form__item">
                <input type="text" name='content' class="update-form__item-txt" value="{{ $todo['content'] }}">
                <input type="hidden" name="id" value="{{ $todo['id'] }}">
                <button class="update-form__item-btn">更新</button>
              </div>
              
            </form>

          </td>
          <td class="todo-list__row-item">
            <form action="/todos/delete"  method="post" class="delete-form">
              @csrf
              <div class="delete-form__button">
                <input type="hidden" name="id" value="{{ $todo['id'] }}">
                <button class="delete-form__button-btn">削除</button>
              </div>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>

@endsection