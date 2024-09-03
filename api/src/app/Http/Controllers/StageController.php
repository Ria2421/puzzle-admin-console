<?php
//-------------------------------------------------
// ステージコントローラー [StageController.php]
// Author:Kenta Nakamoto
// Data:2024/08/21
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Http\Resources\CreateStageResource;
use App\Http\Resources\NormalStageResource;
use App\Models\CreateStage;
use App\Models\NormalStage;
use App\Models\PlayLog;
use App\Models\ShareInfo;
use App\Models\User;
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

    //-------------------------------
    // フォローのクリエイトデータを取得
    public function getFollowStage(Request $request)
    {
        // プレイユーザーのフォロー情報取得
        $user = User::findOrFail($request->user_id);    // プレイユーザーデータを取得
        $follow = $user->follows;                       // フォロー情報を取得
        $followsID = $follow->pluck('id')->toArray();  // フォローユーザーのIDを取得
        // ステージ情報取得
        $stages = CreateStage::whereIn('user_id', $followsID)->get();

        return response()->json(CreateStageResource::collection($stages));
    }

    //--------------------------
    // イイネが多い順で30件取得
    public function getGood()
    {
        // 取得処理
        $stages = CreateStage::orderBy('good_vol', 'desc')->take(30)->get();

        return response()->json(CreateStageResource::collection($stages));
    }

    //---------------------------------
    // フォローが共有したステージを30件取得
    public function getShare(Request $request)
    {
        // プレイユーザーのフォロー情報取得
        $user = User::findOrFail($request->user_id);    // プレイユーザーデータを取得
        $follow = $user->follows;                       // フォロー情報を取得
        $followsID = $follow->pluck('id')->toArray();   // フォローユーザーのIDを取得

        // ステージID一覧を取得
        $share = ShareInfo::select('stage_id')
            ->whereIn('user_id', $followsID)->groupBy('stage_id')->take(30)->get();
        $stagesID = $share->pluck('stage_id')->toArray();  // 配列に変換

        // ステージ情報を取得
        $stages = CreateStage::whereIn('id', $stagesID)->get();

        return response()->json(CreateStageResource::collection($stages));
    }

    //---------------------------------
    // イイネ数の更新処理
    public function updateGood(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'int'],
            'good_vol' => ['required', 'int']
        ]);
        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 更新処理
        $stage = CreateStage::find($request->id);
        $stage->good_vol = $request->good_vol;
        $stage->save();

        // 200ステータスを返す
        return response()->json();
    }

    // クリエイトステージデータを登録
    public function storeStage(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'user_id' => ['required', 'int'],
            'gimmick_pos' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 登録処理
        CreateStage::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'gimmick_pos' => $request->gimmick_pos,
        ]);

        // 200ステータスを返す
        return response()->json();
    }

    // 指定IDのクリエイトステージデータを消去
    public function destroyStage(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'stage_id' => ['required', 'int'],
        ]);
        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // ちゃんとフォローしているIDかチェック
        $stage = CreateStage::find($request->stage_id);

        if (empty($stage)) {
            // リストに居なかった場合、削除成功処理を送信(クライアント側には空の連想配列を送る)
            return response()->json();
        }

        // クリエイトステージ情報削除
        $stage->delete();

        return response()->json();
    }
}
