<?php
//-------------------------------------------------
// プレイヤーコントローラー [PlayerController.php]
// Author:Kenta Nakamoto
// Data:2024/06/18
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\HaveItem;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // アカウント一覧を表示する
    public function index(Request $request)
    {
        // ログインしているかチェック
        if ($request->session()->exists('login')) {
            // ログインしている
            $data = Player::All();

            return view('players/index', ['players' => $data]);
        } else {
            // ログインしてない

            // ログイン画面にリダイレクト
            return redirect('authentications/index');
        }
    }

    // 所持アイテム一覧の表示
    public function showHaveItem(Request $request)
    {
        // ログインしているかチェック
        if ($request->session()->exists('login')) {
            // ログインしている

            // クエリによる情報の取得
            $data = HaveItem::select('players.id as player_id', 'players.name as player_name',
                'items.name as item_name', 'have_items.quantity')
                ->join('players', function ($join) {
                    $join->on('have_items.player_id', '=', 'players.id');
                })
                ->join('items', function ($join) {
                    $join->on('have_items.item_id', '=', 'items.id');
                })->get();

            return view('players/haveItems', ['haveItems' => $data]);
        } else {
            // ログインしてない

            // ログイン画面にリダイレクト
            return redirect('authentications/index');
        }
    }
}
