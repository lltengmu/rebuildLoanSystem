<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\ClientEditProfileRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function index()
    {
        //获取渲染数据
        $appellations = LboAppellations::all();
        $area = LboDistrict::all();
        $job = LboEmployment::all();
        $purpose = LboLoanPurpose::all();
        $company = Company::all();

        //数据查询
        $data = Client::where("email", session("email"))->get()->toArray()[0];
        
        //数据处理
        $data["appellation"] = app("utils")->appellation($data["appellation"]);
        $data["job_status"] = app("utils")->jobStatus($data["job_status"]);
        $data["area"] = app("utils")->area($data["area"]);

        return view("pages.client.profile", [
            "data" => $data,
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
    public function edit(ClientEditProfileRequest $request)
    {
        $client = Client::where("email",session("email"))->first();
        $client->appellation = $request["appellation"];
        $client->mobile = $request["mobile"];
        $client->nationality = $request["nationality"];
        $client->date_of_birth = $request["date_of_birth"];
        $client->addressOne = $request["addressOne"];
        $client->addressTwo = $request["addressTwo"];
        $client->unit = $request["unit"];
        $client->floor = $request["floor"];
        $client->building = $request["building"];
        $client->area = $request["area"];
        $client->job_status = $request["job_status"];
        $client->salary = $request["salary"];
        $client->company_name = $request["company_name"];
        $client->company_contact = $request["company_contact"];
        $client->company_addres = $request["company_addres"];
        $client->save();
        return $client->wasChanged() ? ["success" => "updated success"] : ["failed" => "no update"];
    }
    public function ChangePassword(ChangePassword $request)
    {
         $client = Client::where("email",session("email"))->first();
         $client->password = sha1($request["password"]);
         $client->save();
         return $client->wasChanged() ? ["success" => "updated success"] : ["failed" => "no update"];
    }
}
