<?php
//-------------------------------------------------
// クリエイトステージリソース [CreateStageResource.php]
// Author:Kenta Nakamoto
// Data:2024/08/30
//-------------------------------------------------

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateStageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'gimmick_pos' => $this->gimmick_pos,
            'good_vol' => $this->good_vol,
            'created_at' => $this->created_at->format('Y/m/d H:i:s'),
        ];
    }
}
