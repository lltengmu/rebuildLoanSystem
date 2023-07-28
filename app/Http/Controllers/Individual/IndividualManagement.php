<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndividualCreateAdminRequest;
use App\Http\Requests\IndividualEditAdminRequest;
use App\Models\Individuals;
use Illuminate\Http\Request;

class IndividualManagement extends Controller
{
    public function index()
    {
        return view("pages.individual.individualManagment");
    }
    public function details($id)
    {
        return Individuals::where("id", $this->decryptID($id))->select(["contact", "first_name", "last_name", "email", "mobile"])->get()->toArray()[0];
    }
    /**
     * individual create admin
     * @return json
     */
    public function add(IndividualCreateAdminRequest $request)
    {
        Individuals::create(
            [
                "password" => sha1($request["password"])
            ] + $request->input()
        );
        return $this->success(message: "添加成功", data: null);
    }
    /**
     * individual edit admin
     * @return json
     */
    public function edit(IndividualEditAdminRequest $request, $id)
    {
        $admin = Individuals::find($this->decryptID($id));
        if (sha1($request["password"]) == $admin->password) {
            //不用更新密码
            $admin->update(
                [
                    "password" => $admin->password
                ] + $request->input()
            );
            return $this->success(message: "更新成功", data: null);
        } else {
            $admin->update(
                [
                    "password" => sha1($request["password"])
                ] + $request->input()
            );
            return $this->success(message: "更新成功", data: null);
        }
    }
}
