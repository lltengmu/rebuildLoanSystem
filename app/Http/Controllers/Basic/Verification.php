<?php

namespace App\Http\Controllers\Basic;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetupPasswordRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class Verification extends Controller
{
    public function __invoke($id)
    {
        $client = Client::where("id",$this->decryptID($id))->first()->toArray();
        return is_null($client["password"]) ? view("public.pages.verification") : redirect("/clients/login");
    }
    public function setUpPassword(SetupPasswordRequest $request)
    {
        $id = $request->input("id");
        $client = Client::where("id",$this->decryptID($id))->update(["password" => sha1($request->input("password"))]);
        return ["success" => "setting success"];
    }
}
