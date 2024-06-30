<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  

  @yield('css')
  <title>Document</title>
</head>
<body>
  <header>
    <div class="header__logo">
      <a href="/">Todo</a>
    </div>
    <div class="header__menu">
      <a href="/categories" class="header__menu-link">カテゴリ一覧</a>
    </div>
  </header>
<main>
@yield('content')
</main>

</body>
</html>