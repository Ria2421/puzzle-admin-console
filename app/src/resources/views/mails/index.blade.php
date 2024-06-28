<!--------------------------------------------
// メール定型一覧画面 [index.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メール定型文</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

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
            <li><a href="{{route('users.index')}}" class="nav-link px-2">ユーザー</a></li>
            <li><a href="{{route('items.index')}}" class="nav-link px-2">アイテム</a></li>
            <li><a href="{{route('users.showItem')}}" class="nav-link px-2">持ち物リスト</a></li>
            <li><a href="{{route('mails.index')}}" class="nav-link px-2 link-secondary">定型メール</a></li>
            <li><a href="{{route('mails.showSendItems')}}" class="nav-link px-2">添付アイテムリスト</a></li>
            <li><a href="{{route('mails.showReceiveMails')}}" class="nav-link px-2">ユーザー受信メール</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <form method="POST" action="{{route('auth.logout')}}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
            </form>
        </div>

    </header>
</div>

<!-- 表示内容 -->
<div class="container text-center bg-primary-subtle" style="width: 500px">
    <h3 class="display-5">▼ メール定型文 ▼</h3>
</div>

<!--検索-->
<div class="text-center">
    <form method="POST" action="{{route('mails.show')}}">
        @csrf
        <input type="text" name="id" placeholder="メールIDを入力">
        <input type="submit" value="検索">
    </form>
</div>

<br>

<table class="table table-bordered mx-auto p-2" style="width: 60%">
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>本文</th>
        <th>生成日時</th>
        <th>更新日時</th>
    </tr>

    @foreach($mails as $mail)
        <tr>
            <td>{{$mail['id']}}</td>
            <td>{{$mail['title']}}</td>
            <td>{{$mail['content']}}</td>
            <td>{{$mail['created_at']}}</td>
            <td>{{$mail['updated_at']}}</td>
        </tr>
    @endforeach

</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>
