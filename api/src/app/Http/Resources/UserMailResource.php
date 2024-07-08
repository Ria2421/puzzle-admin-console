<?php
//-------------------------------------------------
// 受信メールリソース [UserMailResource.php]
// Author:Kenta Nakamoto
// Data:2024/07/08
//-------------------------------------------------

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserMailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'mail_id' => $this->mail_id,
            'send_item_id' => $this->send_item_id,
            'unsealed_flag' => $this->unsealed_flag,
        ];
    }
}
