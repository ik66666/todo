@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')

@if(session('message'))
<div class="success-msg">
  <div class="success-msg__txt">
    {{ session('message')}}
  </div>
</div>
@endif

@if( $errors->any())
<div class="error-msg">
  <ul>
    @foreach($errors->all() as $error)
    <li class="error-msg__txt">{{ $error}} </li>
    @endforeach
  </ul>
</div>
@endif

<div class="category">
  <div class="category__create">
    <form action="/categories" method="POST" class="category__create-form">
      @csrf
      <input type="text"  name="name" value="{{ old('name') }}" class="category__create-form-txt">
      <button class="category__create-form-btn">作成</button>
    </form>
  </div>
  <div class="category__table">
    <table class="category-list">
      <th class="category-list__ttl">
        <span>category</span>
      </th>
      @foreach($categories as $category)
      <tr class="category-list__row">
        <td class="category-list__row-item">
          <form action="/categories/update" method="post" class="update-form">
            @method("PATCH")
            @csrf
            <div class="update-form__content">
              <input type="text" name="name" value=" {{ $category['name'] }} " class="update-form__txt">
              <input type="hidden" name="id" value="{{ $category['id'] }}">
            </div>
              <button class="update-form__button">更新</button>
          </form>
        </td>
        <td class="delete-form">
          <form action="/categories/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $category['id']}}">
            <div class="delete-form__btn">
              <button class="delete-form__btn-btn">削除</button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>


@endsection