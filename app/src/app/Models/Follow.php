<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    // 更新しないカラムを指定 (idはauto_incrementの為)
    protected $guarded = [
        'id',
    ];
}
