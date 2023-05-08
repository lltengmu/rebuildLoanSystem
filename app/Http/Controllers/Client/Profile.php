<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
}
