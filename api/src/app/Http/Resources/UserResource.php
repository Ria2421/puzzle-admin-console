<?php
//-------------------------------------------------
// ユーザーリソース [UserResource.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'level' => $this->level,
            'exp' => $this->exp,
            'life' => $this->life,
        ];
    }
}
