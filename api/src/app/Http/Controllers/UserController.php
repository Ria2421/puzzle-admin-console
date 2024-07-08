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
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // 指定IDのユーザーデータをJSON形式で返す
    public function show(Request $request)
    {
        // 指定ユーザーのデータを取得
        $user = User::findOrFail($request->user_id);
        return response()->json(UserResource::make($user));
    }

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
}
