<?php
//-------------------------------------------------
// クリエイトステージモデル [CreateStage.php]
// Author:Kenta Nakamoto
// Data:2024/08/08
//-------------------------------------------------

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateStage extends Model
{
    protected function casts()
    {
        return [
            'gimick_pos' => 'array',
        ];
    }
}
