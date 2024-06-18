<?php
//-------------------------------------------------
// アカウントコントローラー [AccountController.php]
// Author:Kenta Nakamoto
// Data:2024/06/11
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        // ログインしているかチェック
        if ($request->session()->exists('login')) {
            // ログインしている

            if (isset($request->id)) {
                // id指定有
                $data = Account::where('id', '=', $request->id)->get();

            } else {
                // id指定無
                $data = Account::All();
            }

            return view('accounts/index', ['accounts' => $data]);
        } else {
            // ログインしてない

            // ログイン画面にリダイレクト
            return redirect('authentications/index');
        }
    }
}

//- デバック -//
//dd関数
//dd($request->account_id);

//Laravel DebugBar
// use Barryvdh\Debugbar\Facades\Debugbar;
//Debugbar::info('あいうえお');
//Debugbar::error('えらーだよ');

/* セッションに指定のキーで値を保存
$request->session()->put('name', 'hoge');
// セッションから指定のキーの値を取得
$value = $request->session()->get('name');
// 指定したデータをセッションから削除
$request->session()->forget('name');
// セッションのデータをすべて削除
$request->session()->flush();
// セッションに指定してキーが存在するか
if ($request->session()->exists('name')) {

}
dd($value);*/
