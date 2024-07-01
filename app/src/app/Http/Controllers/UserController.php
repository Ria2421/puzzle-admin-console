<?php
//-------------------------------------------------
// ユーザーコントローラー [UserController.php]
// Author:Kenta Nakamoto
// Data:2024/06/18
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\HaveItem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // アカウント一覧を表示する
    public function index(Request $request)
    {
        $data = User::paginate(10);
        $data->onEachSide(2);

        return view('users/index', ['users' => $data]);
    }

    // 所持アイテム一覧の表示
    public function showItem(Request $request)
    {
        // クエリによる情報の取得
        $data = HaveItem::select([
            'users.id as user_id',
            'users.name as user_name',
            'items.name as item_name',
            'have_items.quantity'
        ])
            ->join('users', function ($join) {
                $join->on('have_items.user_id', '=', 'users.id');
            })
            ->join('items', function ($join) {
                $join->on('have_items.item_id', '=', 'items.id');
            })->paginate(10);
        $data->onEachSide(2);

        return view('users/haveItems', ['haveItems' => $data]);
    }
}
