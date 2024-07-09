<?php
//-------------------------------------------------
// ユーザーコントローラー [UserController.php]
// Author:Kenta Nakamoto
// Data:2024/06/18
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\HaveItem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー一覧を表示する
    public function index(Request $request)
    {
        $data = User::paginate(10);
        $data->onEachSide(2);

        return view('users/index', ['users' => $data]);
    }

    // 所持アイテム一覧の表示
    public function showItem(Request $request)
    {
        // 指定されたIDのデータを取得
        $user = User::find($request->user_id);
        if (!empty($user)) {
            $items = $user->items()->paginate(10);
            $items->appends(['id' => $request->user_id]);
        }

        return view('users/haveItems', ['user' => $user, 'items' => $items ?? null]);
    }

    public function showFollow(Request $request)
    {
        $user = User::find($request->user_id);
        if (!empty($user)) {
            $follows = $user->follows()->get();
            $followers = $user->followers()->get();

            $follows_id = $follows->pluck('id')->toArray();
            $followers_id = $followers->pluck('id')->toArray();
            $mutualUsersID = array_intersect($follows_id, $followers_id);

            $mutualUsers = User::whereIn('id', $mutualUsersID)->get();
        }

        return view('users.showFollows',
            ['follows' => $follows ?? null, 'followers' => $followers ?? null, 'mutualUsers' => $mutualUsers ?? null]);
    }
}
