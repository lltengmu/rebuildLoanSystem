<?php

namespace App\Http\Controllers\Auth;

use App\Events\EmailVerifiedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailVerificationRequest;
use App\Models\Client;

class Verification extends Controller
{
    public function __invoke(EmailVerificationRequest $request, $id)
    {
        $client = Client::find($this->decryptID($id));

        if ($request->isMethod("post")) {

            $client->update(
                [
                    "password" => sha1($request["password"]),
                    "email_verified_at" => date("Y-m-d H:m:s")
                ]
            );
            //log event
            event(new EmailVerifiedEvent($client));

            return $this->success(message:"邮箱验证成功",data:null);
        }
        return is_null($client->password) ? view("public.pages.verification") : redirect("/clients/login");
    }
}
