<?php
//----------------------------------------------------------
// クリエイトステージ情報リソース [CreateStageInfoResource.php]
// Author:Kenta Nakamoto
// Data:2024/09/11
//----------------------------------------------------------

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateStageInfoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon_id' => $this->icon_id,
            'user_id' => $this->user_id,
            'user_name' => $this->user_name,
            'good_vol' => $this->good_vol,
        ];
    }
}
