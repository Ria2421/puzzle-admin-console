<?php
//-------------------------------------------------
// メールコントローラー [MailController.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Http\Resources\UserMailResource;
use App\Models\HaveItem;
use App\Models\Mail;
use App\Models\ReceiveMails;
use App\Models\SendItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    //--------------------------------
    // メールのマスターデータをすべて取得
    public function index(Request $request)
    {
        $mails = Mail::All();
        return response()->json(MailResource::collection($mails));
    }

    //----------------------------
    // ユーザーID指定の受信メール取得
    public function receive(Request $request)
    {
        $receive = ReceiveMails::findOrFail($request->user_id);
        return response()->json(UserMailResource::make($receive));
    }

    //-----------------
    // メール開封処理
    public function update(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'mail_id' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 開封処理--------------------------------------

        // トランザクション処理
        DB::transaction(function () use ($request, $validator) {
            // 該当するメールを検索
            $mail = ReceiveMails::where('user_id', $request->user_id)->where('mail_id', $request->mail_id)->first();

            if (!isset($mail)) {
                // 取得エラーが起きた時はステータス400を返す
                return response()->json($validator->errors(), 400);
            }

            // 開封フラグをtrueに変更
            $mail->unsealed_flag = true;
            $mail->save();

            // アイテム受け取り処理 ----------------------------

            // 開封フラグがfalseの時のみ行う

            // 添付アイテム情報を取得 (アイテムIDと個数)
            $getItem = SendItem::find($mail->send_item_id);

            // ユーザーが添付アイテムを所持しているかチェック
            $item = HaveItem::where('user_id', $request->user_id)->where('item_id', $getItem->item_id)->first();

            if (isset($item)) {
                // 所持している場合は更新処理

                // 数量変更
                $item->quantity = $item->quantity + $getItem->quantity;
                // 保存
                $item->save();

                // 200ステータスを返す
                return response()->json();
            } else {
                // 所持していない場合は登録処理

                HaveItem::create([
                    'user_id' => $request->user_id,
                    'item_id' => $getItem->item_id,
                    'quantity' => $getItem->quantity,
                ]);

                // 200ステータスを返す
                return response()->json();
            }
        });
    }
}
