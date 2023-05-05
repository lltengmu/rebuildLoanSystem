<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;

class LoanApplication extends Controller
{
    public function index()
    {
        $appellations = LboAppellations::all();
        $area = LboDistrict::all();
        $job = LboEmployment::all();
        $purpose = LboLoanPurpose::all();
        $company = Company::all();
        return view("pages.client.loanApplication", [
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
    /**
     * 显示贷款详情页
     */
    public function cases()
    {
        $data = Client::where("email",session("email"))->with("cases")->select(["id","sys_id","first_name","last_name"])->get()->toArray()[0];
        //dd($data);
        return array_map(function($key,$item) use ($data){
            return [
                "num" => $key + 1,
                "case_id" => $item["sys_id"],
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "loan_amount" => $item["loan_amount"],
                "company" => app("utils")->company($item["company_id"]),
                "repayment_period" => $item["repayment_period"],
                "disbursement_date" => $item["disbursement_date"],
                "case_status" => app("utils")->caseStatus($item["case_status"]),
            ];
        },array_keys($data["cases"]),array_values($data["cases"]));
    }
    /**
     * edit
     */
    public function edit($id)
    {
        return Cases::where("id",$this->decryptID($id))->select(["loan_amount","repayment_period","purpose"])->first();
    }
}
