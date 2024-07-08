<?php
//-------------------------------------------------
// アイテムコントローラー [ItemController.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 全アイテムの情報を返す
    public function index(Request $request)
    {
        $items = Item::All();
        return response()->json(ItemResource::collection($items));
    }
}
