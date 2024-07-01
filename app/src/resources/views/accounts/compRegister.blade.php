<!--------------------------------------------
// 登録完了画面 [compRegister.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/24
//-------------------------------------------->

@extends('layouts.app')

@section('title','アカウント一覧')

@section('body')
    <!-- 表示内容 -->
    <div class="container text-center bg-primary-subtle" style="width: 500px">
        <h3 class="display-6">▼ アカウント登録 ▼</h3>
    </div>
    <div class="text-center">
        <br>
        [ {{$name}} ]の登録が完了しました。
    </div>
@endsection
