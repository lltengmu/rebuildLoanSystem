<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
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
        $data = Client::where("id", $this->decryptID($id))->get()->toArray()[0];
        
        //数据处理
        $data["appellation"] = app("utils")->appellation($data["appellation"]);
        $data["job_status"] = app("utils")->jobStatus($data["job_status"]);
        $data["area"] = app("utils")->area($data["area"]);
        // dd($data);
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
