<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndividualCreateSpRequest;
use App\Http\Requests\IndividualEditSpRequest;
use App\Models\Company;
use App\Models\ServiceProvider as ModelServiceProvider;
use Illuminate\Http\Request;

class ServiceProvider extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view("pages.individual.serviceProviderManagment", [
            "company" => $company
        ]);
    }
    public function details($id)
    {
        $data = ModelServiceProvider::where("id", $this->decryptID($id))->select(["contact", "company_id", "first_name", "last_name", "email", "mobile"])->get()->toArray()[0];
        return $data;
    }
    /**
     * individual create sp
     * @return json
     */
    public function add(IndividualCreateSpRequest $request)
    {
        ModelServiceProvider::create(
            [
                "password" => sha1($request["password"])
            ] + $request->input()
        );
        return $this->success(message: "添加成功", data: null);
    }
    /**
     * individual edit sp
     * @return json
     */
    public function edit(IndividualEditSpRequest $request, $id)
    {
        $sp = ModelServiceProvider::find($this->decryptID($id));
        if (sha1($request["password"]) == $sp->password) {
            //不用更新密码
            $sp->update(
                [
                    "password" => $sp->password
                ] + $request->input()
            );
            return $this->success(message: "更新成功", data: null);
        } else {
            $sp->update(
                [
                    "password" => sha1($request["password"])
                ] + $request->input()
            );
            return $this->success(message: "更新成功", data: null);
        }
    }
}
