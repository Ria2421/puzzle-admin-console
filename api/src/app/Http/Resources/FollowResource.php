<?php
//-------------------------------------------------
// フォローリソース [FollowResource.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
