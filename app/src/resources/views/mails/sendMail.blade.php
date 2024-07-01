<!--------------------------------------------
// メール送信画面 [sendMail.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/27
//-------------------------------------------->
@extends('layouts.app')

@section('title','送信')

@section('body')
    <!-- 表示内容 -->
    <div class="container text-center bg-primary-subtle" style="width: 500px">
        <h3 class="display-6">▼ メール送信 ▼</h3>
    </div>
    <br>

    <!-- 送信フォーム -->
    <div class="mx-auto p-2" style="width: 400px;">
        <form method="POST" action="{{route('accounts.show')}}">
            @csrf
            <div>送信ユーザーIDを選択してください</div>
            <select name="user_id" class="form-select">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>

            <div>送信するメール内容を選択してください</div>
            <select name="mail_id" class="form-select">
                <option>1</option>
                <option>2</option>
            </select>

            <div>添付するアイテムを選択してください</div>
            <select name="send_item_id" class="form-select">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>

            <button type="submit" class="btn btn-outline-primary me-2">送信</button>
        </form>
    </div>
@endsection
