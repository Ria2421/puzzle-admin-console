<?php
//-------------------------------------------------
// メールコントローラー [AccountController.php]
// Author:Kenta Nakamoto
// Data:2024/06/27
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\ReceiveMails;
use App\Models\SendItem;

class MailController extends Controller
{
    // 定型メール一覧の表示
    public function index()
    {
        if (isset($request->id)) {
            // id指定有
            $data = Mail::where('id', '=', $request->id)->paginate(10);
            $data->onEachSide(2);;

        } else {
            // id指定無
            $data = Mail::paginate(10);
            $data->onEachSide(2);;
        }

        return view('mails/index', ['mails' => $data]);
    }

    // メール添付アイテム一覧の表示
    public function showSendItems()
    {
        // クエリによる情報の取得
        $data = SendItem::select([
            'send_items.id as id',
            'items.name as name',
            'send_items.quantity as quantity',
            'send_items.created_at as created_at',
            'send_items.updated_at as updated_at',
        ])
            ->join('items', function ($join) {
                $join->on('send_items.item_id', '=', 'items.id');
            })->paginate(10);

        $data->onEachSide(2);

        return view('mails.sendItem', ['items' => $data]);
    }

    // ユーザー受信メール一覧の表示
    public function showReceiveMails()
    {
        // クエリによる情報の取得
        $data = ReceiveMails::select([
            'receive_mails.id as id',
            'users.name as user_name',
            'mails.title as mail_title',
            'receive_mails.send_item_id as send_item_id',
            'receive_mails.unsealed_flag as unsealed_flag',
            'receive_mails.created_at as created_at',
            'receive_mails.updated_at as updated_at',
        ])
            ->join('users', function ($join) {
                $join->on('receive_mails.user_id', '=', 'users.id');
            })
            ->join('mails', function ($join) {
                $join->on('receive_mails.mail_id', '=', 'mails.id');
            })
            ->paginate(10);
        $data->onEachSide(2);

        return view('mails.receive', ['mails' => $data]);
    }

    // メール送信フォームの表示
    public function showSendMail()
    {
        return view('mails.sendMail');
    }

    // 送信処理

}
