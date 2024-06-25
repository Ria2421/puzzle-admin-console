<?php
//-------------------------------------------------
// アイテムコントローラー [ItemController.php]
// Author:Kenta Nakamoto
// Data:2024/06/18
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // アイテム一覧の表示
    public function index(Request $request)
    {
        $data = Item::All();
        return view('items/index', ['items' => $data]);
    }
}
