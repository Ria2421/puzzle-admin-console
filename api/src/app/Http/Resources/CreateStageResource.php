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
            'gimmick_pos' => $this->gimmick_pos,
        ];
    }
}
