<!--------------------------------------------
// 所持アイテム一覧画面 [haveItem.blade.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------->
@extends('layouts.app')

@section('title','所持アイテム一覧')
@section('haveItem','link-secondary')

@section('body')
    <!-- 表示内容 -->
    <div class="container text-center bg-primary-subtle" style="width: 500px">
        <h3 class="display-6">▼ 所持アイテム一覧 ▼</h3>
    </div>

    <!-- ページネーション -->
    <div class="d-flex justify-content-center">
        {{$haveItems->links('vendor.pagination.bootstrap-5')}}
    </div>

    <table class="table table-bordered mx-auto p-2" style="width: 60%">
        <tr>
            <th>ユーザーID</th>
            <th>ユーザー名</th>
            <th>アイテム名</th>
            <th>所持個数</th>
        </tr>

        @foreach($haveItems as $haveItem)
            <tr>
                <td>{{$haveItem['user_id']}}</td>
                <td>{{$haveItem['user_name']}}</td>
                <td>{{$haveItem['item_name']}}</td>
                <td>{{$haveItem['quantity']}}</td>
            </tr>
        @endforeach

    </table>
@endsection
