<?php

namespace App\Http\Controllers\individual;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;

class ClientManagment extends Controller
{
    public function index()
    {
        return view("pages.individual.clientsManagment");
    }
    public function details($id)
    {
        $appellations = LboAppellations::all();
        $area = LboDistrict::all();
        $job = LboEmployment::all();
        $purpose = LboLoanPurpose::all();
        $company = Company::all();

        //数据查询，这里用到数据库模型的反向关联查询
        $data = Cases::with("client")
            ->with("company")
            ->with("LboCaseStatus")
            ->where("id", $this->decryptID($id))->get()->toArray()[0];
        //数据处理
        $data["client"]["appellation"] = app("utils")->appellation($data["client"]["appellation"]);
        $data["client"]["job_status"] = app("utils")->jobStatus($data["client"]["job_status"]);
        $data["client"]["area"] = app("utils")->area($data["client"]["area"]);
        $data["purpose"] = app("utils")->purpose($data["purpose"]);
        //获取渲染数据
        $appellations = LboAppellations::all();
        $area = LboDistrict::all();
        $job = LboEmployment::all();
        $purpose = LboLoanPurpose::all();
        $company = Company::all();

        return view("public.pages.clientsDetails", [
            "data" => $data,
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
}
