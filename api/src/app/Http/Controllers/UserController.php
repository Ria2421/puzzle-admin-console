<?php
//-------------------------------------------------
// ユーザーコントローラー [UserController.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Http\Resources\FollowResource;
use App\Http\Resources\UserItemResource;
use App\Http\Resources\UserResource;
use App\Models\Follow;
use App\Models\FollowLogs;
use App\Models\HaveItem;
use App\Models\ItemLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class UserController extends Controller
{
    //======================================================================
    // ユーザーデータ関連 ===============================

    //------------------------------------
    // 指定IDのユーザーデータをJSON形式で返す
    public function show(Request $request)
    {
        // 指定ユーザーのデータを取得
        $user = User::findOrFail($request->user_id);
        return response()->json(UserResource::make($user));
    }

    //------------------------------------------
    // 指定のlevel条件に一致するユーザーをすべて返す
    public function index(Request $request)
    {
        // ヴァリデーションチェック
        $validator = Validator::make($request->all(), [
            'min_level' => ['required', 'integer'],
            'max_level' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // データの取得
        $users = User::All()->where('level', '>=', $request->min_level)
            ->where('level', '<=', $request->max_level);

        // JSONにして返す
        return response()->json(UserResource::collection($users));
    }

    //--------------------
    // ユーザーの登録処理
    public function store(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:64'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 登録処理
        $user = User::create([
            'name' => $request->name,
            'level' => 1,
            'exp' => 0,
            'life' => 5,
        ]);

        // クライアント側に自分のIDを送る
        return response()->json(['user_id' => $user->id]);
    }

    //-----------------------
    // ユーザー情報の更新処理
    public function update(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'name' => ['string', 'max:64'],
            'level' => ['int'],
            'exp' => ['int'],
            'life' => ['int'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // トランザクション処理
        try {
            // データの取得
            $user = User::findOrFail($request->user_id);

            // 渡ってきたデータごとに上書き処理
            if (isset($request->name)) {    // 名前
                $user->name = $request->name;
            }
            if (isset($request->level)) {   // レベル
                $user->level = $request->level;
            }
            if (isset($request->exp)) {     // 経験値
                $user->exp = $request->exp;
            }
            if (isset($request->life)) {    // ライフ
                $user->life = $request->life;
            }

            // 更新処理
            $user->save();

            // 完了ステータスを送信(クライアントには空の連想配列が渡る)
            return response()->json();

        } catch (Exception $e) {
            // エラーメッセージ(ステータス:500)を返す
            return response()->json($e, 500);
        }
    }

    //======================================================================
    // フォロー関連 =====================================

    //----------------------------------
    // 指定ユーザーIDのフォローリストを返す
    public function follows(Request $request)
    {
        // 指定IDのユーザーデータをJSON形式で返す
        $user = User::findOrFail($request->user_id);

        // フォロー・フォロワーリスト----------------------

        // データの取得
        $follow = $user->follows;
        $follower = $user->followers;

        // 返り値変数にフォロー・フォロワーのデータを格納
        $response['follow'] = FollowResource::collection($follow);
        $response['follower'] = FollowResource::collection($follower);

        // 相互フォローデータを取得------------------------

        // フォロー・フォロワーのユーザーIDを取り出す
        $follows_id = $follow->pluck('id')->toArray();
        $followers_id = $follower->pluck('id')->toArray();

        // 取り出したIDで一致するものを検索
        $mutualUsersID = array_intersect($follows_id, $followers_id);
        $mutualUsers = User::whereIn('id', $mutualUsersID)->get();
        $response['mutual'] = FollowResource::collection($mutualUsers);

        return response()->json($response);
    }

    //-----------------
    // フォロー登録処理
    public function followStore(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'follow_id' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 指定されたユーザーIDが存在するか確認

        // 既にフォローしていないかチェック
        $check = Follow::where('follow_id', $request->follow_id)->where('user_id', $request->user_id)->first();

        if (isset($check)) {
            // 既フォローの場合ステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // トランザクション処理
        try {
            DB::transaction(function () use ($request) {
                // チェック後に登録処理
                Follow::create([
                    'user_id' => $request->user_id,
                    'follow_id' => $request->follow_id,
                ]);

                // 登録ログを記録
                FollowLogs::create([
                    "user_id" => $request->user_id,
                    "target_user_id" => $request->follow_id,
                    "action" => 1
                ]);

                // フォローしたユーザー情報を取得
                $followUser = User::findOrFail($request->follow_id);

                return response()->json(['follow_name' => $followUser->name]);
            });
        } catch (Exception $e) {
            // エラーメッセージ(ステータス:500)を返す
            return response()->json($e, 500);
        }
    }

    //----------------
    // フォロー解除処理
    public function followDestroy(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'follow_id' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // トランザクション対応
        try {
            DB::transaction(function () use ($request) {
                // ちゃんとフォローしているIDかチェック
                $follow = Follow::where('follow_id', $request->follow_id)->where('user_id', $request->user_id)->first();

                if (empty($follow)) {
                    // リストに居なかった場合、削除成功処理を送信(クライアント側には空の連想配列を送る)
                    return response()->json();
                }

                // フォロー情報削除
                $follow->delete();

                // 登録ログを記録
                FollowLogs::create([
                    "user_id" => $request->user_id,
                    "target_user_id" => $request->follow_id,
                    "action" => 2
                ]);
            });

            // フォローしたユーザー情報を取得
            $followUser = User::findOrFail($request->follow_id);

            // 削除成功処理を送信(クライアント側には削除した相手の名前を送る)
            return response()->json(['follow_name' => $followUser->name]);
        } catch (Exception $e) {
            // エラーメッセージ(ステータス:500)を返す
            return response()->json($e, 500);
        }
    }

    //======================================================================
    // 所持アイテム関連 =====================================

    //-----------------------------------
    // 指定ユーザーの所持アイテムリストを返す
    public function items(Request $request)
    {
        // 指定IDのユーザーデータをJSON形式で返す
        $user = User::findOrFail($request->user_id);

        // 所持アイテムリストをリレーションで取得
        $items = $user->items;

        // 中間テーブル(have_items)のリソースを使いJSON化
        $response['items'] = UserItemResource::collection($items);

        return response()->json($response);
    }

    //-----------------------------------
    // 指定ユーザーの所持アイテム更新
    public function itemUpdate(Request $request)
    {
        // バリデーションチェック
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'int'],
            'item_id' => ['required', 'int'],
            'get_vol' => ['int'],               // 入手量
            'use_vol' => ['int'],               // 消費量
        ]);

        if ($validator->fails()) {
            // エラーが起きた時はステータス400を返す
            return response()->json($validator->errors(), 400);
        }

        // 指定されたユーザーIDが存在するか確認

        // 指定されたアイテムIDが存在するか

        // トランザクション処理
        try {
            DB::transaction(function () use ($request) {
                // アイテムを所持しているかチェック
                $item = HaveItem::where('user_id', $request->user_id)->where('item_id', $request->item_id)->first();

                if (isset($item)) {
                    // 所持している場合

                    if (isset($request->get_vol)) {
                        // 更新処理

                        // 数量変更
                        $item->quantity = $item->quantity + $request->get_vol;
                        // 保存
                        $item->save();

                        // 入手ログを記録
                        ItemLogs::create([
                            "user_id" => $request->user_id,
                            "target_item_id" => $request->item_id,
                            "action" => 2,
                            "quantity" => $request->get_vol
                        ]);

                        // 200ステータスを返す
                        return response()->json();
                    } elseif ($request->use_vol) {
                        // 消費処理

                        // 数量変更
                        $item->quantity = $item->quantity - $request->use_vol;

                        if ($item->quantity < 0) {
                            // 使用した結果、0より下回った時,ステータス400を返す
                            return response()->json(["error" => "useError!"], 400);
                        }

                        // 保存
                        $item->save();

                        // 消費ログを記録
                        ItemLogs::create([
                            "user_id" => $request->user_id,
                            "target_item_id" => $request->item_id,
                            "action" => 1,
                            "quantity" => $request->use_vol
                        ]);

                        // 200ステータスを返す
                        return response()->json();
                    }
                } else {
                    // 所持していない場合

                    if (isset($request->get_vol)) {
                        // 登録処理
                        HaveItem::create([
                            'user_id' => $request->user_id,
                            'item_id' => $request->item_id,
                            'quantity' => $request->get_vol,
                        ]);

                        // 入手ログを記録
                        ItemLogs::create([
                            "user_id" => $request->user_id,
                            "target_item_id" => $request->item_id,
                            "action" => 2,
                            "quantity" => $request->get_vol
                        ]);

                        // 200ステータスを返す
                        return response()->json();
                    } elseif ($request->use_vol) {
                        // 消費処理 (送られてくることは無いが念のため)

                        // 200ステータスを返す
                        return response()->json();
                    }
                }
            });
        } catch (Exception $e) {
            // エラーメッセージ(ステータス:500)を返す
            return response()->json($e, 500);
        }
    }
}
