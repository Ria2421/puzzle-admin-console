<!--------------------------------------------
// 登録画面 [regist.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/10
//-------------------------------------------->

<!doctype html>
<html lang="ja">
<head>
    <title>Signin</title>
    <link rel="canonical" href="https://getbootstrap.jp/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="/signin.css" rel="stylesheet">
</head>
<body class="text-center d-flex flex-column">

<!-- ヘッダー -->
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li>
                <form method="GET" action="{{route('accounts.create')}}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary me-2">登録</button>
                </form>
            </li>
            <li><a href="{{route('accounts.index')}}" class="nav-link px-2">アカウント</a></li>
            <li><a href="{{route('users.index')}}" class="nav-link px-2  link-secondary">ユーザー</a></li>
            <li><a href="{{route('items.index')}}" class="nav-link px-2">アイテム</a></li>
            <li><a href="{{route('users.showItem')}}" class="nav-link px-2">持ち物リスト</a></li>
            <li><a href="{{route('mails.index')}}" class="nav-link px-2">定型メール</a></li>
            <li><a href="{{route('mails.showSendItems')}}" class="nav-link px-2">添付アイテムリスト</a></li>
            <li><a href="{{route('mails.showReceiveMails')}}" class="nav-link px-2">ユーザー受信メール</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <form method="POST" action="{{route('auth.logout')}}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">ログアウト</button>
            </form>
        </div>

    </header>
</div>

<form class="form-signin" method="POST" action="{{route('accounts.store')}}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">アカウント登録</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    @if($error)
        <ul>
            <li>入力された名前は既に登録されています。</li>
        </ul>
    @endif

    <label for="inputEmail" class="sr-only">アカウント名</label>
    <input type="text" id="inputEmail" name="name" class="form-control" placeholder="アカウント名" required autofocus>
    <label for="inputPassword" class="sr-only">パスワード</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード" required>
    <label for="inputPassword" class="sr-only">パスワード再入力</label>
    <input type="password" id="inputPassword" name="password_confirmation" class="form-control" placeholder="パスワード再入力"
           required>
    <div class="checkbox mb-3">
    </div>
    <button class="btn btn-lg btn-primary btn-block" name="register_btn" type="submit">登録</button>
    <input type="hidden" name="action" value="doRegister">
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
</body>
</html>
