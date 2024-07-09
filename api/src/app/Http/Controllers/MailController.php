<?php

namespace App\Http\Controllers;

use App\Http\Resources\MailResource;
use App\Http\Resources\UserMailResource;
use App\Models\Mail;
use App\Models\ReceiveMails;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //--------------------------------
    // メールのマスターデータをすべて取得
    public function index(Request $request)
    {
        $mails = Mail::All();
        return response()->json(MailResource::collection($mails));
    }

    //----------------------------
    // ユーザーID指定の受信メール取得
    public function receive(Request $request)
    {
        $receive = ReceiveMails::findOrFail($request->user_id);
        return response()->json(UserMailResource::make($receive));
    }
}
