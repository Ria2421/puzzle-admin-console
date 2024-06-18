<?php
//-------------------------------------------------
// 認証用コントローラー [AuthController.php]
// Author:Kenta Nakamoto
// Data:2024/06/18
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ログイン画面を表示する
    public function index(Request $request)
    {
        // ログインしてるかチェック
        if ($request->session()->exists('login')) {
            return redirect('accounts/index');
        } else {
            return view('authentications/index');
        }
    }

    // ログイン処理
    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:4', 'max:20'],
            'password' => ['required'],
        ]);

        // DBから指定のアカウント情報を取得
        $account = Account::where('name', '=', $request->name)->get();

        if (Hash::check($request->password, $account[0]->password)) {
            // 一致した時

            // セッションにログイン情報を登録
            $request->session()->put('login', true);
            // 一覧表示
            return redirect('accounts/index');
        } else {
            // 一致しなかった時

            // エラー表示
            return redirect('login', ['error' => 'invalid']);
        }
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        // 指定したデータをセッションから削除
        $request->session()->forget('login');

        // ログイン画面にリダイレクト
        return redirect('authentications/index');
    }
}
