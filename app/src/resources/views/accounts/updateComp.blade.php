<!--------------------------------------------
// 登録完了画面 [compRegister.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/24
//-------------------------------------------->

@extends('layouts.app')

@section('title','更新完了')

@section('body')
    <!-- 表示内容 -->
    <div class="container text-center bg-primary-subtle" style="width: 500px">
        <h3 class="display-6">▼ パスワード更新 ▼</h3>
    </div>
    <div class="text-center">
        <br>
        [ {{$name}} ]の更新が完了しました。
    </div>
@endsection
