<?php
//-------------------------------------------------
// ユーザーモデル [User.php]
// Author:Kenta Nakamoto
// Data:2024/06/24
//-------------------------------------------------

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    // 更新しないカラムを指定 (idはauto_incrementの為)
    protected $guarded = [
        'id',
    ];

    // -------------------------------------
    // リレーションの設定

    // 所持アイテム
    public function items()
    {
        return $this->belongsToMany(Item::class, 'have_items', 'user_id', 'item_id')
            ->withPivot('quantity');
    }

    // フォロー
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id');
    }

    // フォロワー
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id');
    }
}
