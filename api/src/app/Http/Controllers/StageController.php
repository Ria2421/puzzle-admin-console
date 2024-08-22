<?php
//-------------------------------------------------
// ステージコントローラー [StageController.php]
// Author:Kenta Nakamoto
// Data:2024/08/21
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\PlayLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StageController extends Controller
{
    //------------------------------------
    // リザルトログ登録処理
    public function storeResult(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'stage_id' => ['required', 'int'],
            'stage_type' => ['required', 'int'],
            'clear_flag' => ['required', 'bool'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        //-------------------------------------------------------------
        // ログ登録処理

        // 受信ログを生成
        PlayLog::create([
            'user_id' => $request->user_id,
            'stage_id' => $request->mail_id,
            'stage_type' => $request->send_item_id,
            'clear_flag' => $request->clear_flag
        ]);
    }
}
