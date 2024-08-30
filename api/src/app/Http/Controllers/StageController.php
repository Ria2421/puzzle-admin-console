<?php
//-------------------------------------------------
// ステージコントローラー [StageController.php]
// Author:Kenta Nakamoto
// Data:2024/08/21
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Http\Resources\NormalStageResource;
use App\Models\NormalStage;
use App\Models\PlayLog;
use App\Models\ShareInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StageController extends Controller
{
    //------------------------------------
    // ノーマルステージデータ取得
    public function getNormal()
    {
        $stages = NormalStage::All();
        return response()->json(NormalStageResource::collection($stages));
    }

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
            'stage_id' => $request->stage_id,
            'stage_type' => $request->stage_type,
            'clear_flag' => $request->clear_flag
        ]);
        // 完了ステータスを送信(クライアントには空の連想配列が渡る)
        return response()->json();
    }

    //-------------------------------
    // クリエイトステージ共有処理
    public function share(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'stage_id' => ['required', 'int']
        ]);
        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 共有情報登録処理
        ShareInfo::create([
            'user_id' => $request->user_id,
            'stage_id' => $request->stage_id,
        ]);
        // 完了ステータスを送信(クライアントには空の連想配列が渡る)
        return response()->json();
    }

}
