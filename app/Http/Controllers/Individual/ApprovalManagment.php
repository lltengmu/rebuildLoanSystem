<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndividualApprovalEdit;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;

class ApprovalManagment extends Controller
{
    /**
     * @return page
     */
    public function index()
    {
        $appellations = LboAppellations::all();
        $area = LboDistrict::all();
        $job = LboEmployment::all();
        $purpose = LboLoanPurpose::all();
        $company = Company::all();
        return view('pages.individual.ApprovalManagment',[
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" =>$company
        ]);
    }
    public function cases()
    {
        //读取数据
        $caseTable = Cases::with("company:id,name")->with("client:id,first_name,last_name")->whereIn("case_status", [1, 2, 5])->select([
            'id',
            'sys_id',
            'client_id',
            'company_id',
            'loan_amount',
            'case_status',
            'disbursement_date',
            'repayment_period',
            'status',
        ])->get()->toArray();

        //数据处理
        $data = array_map(function ($key,$item) {
            return [
                "num" => $key + 1,
                "id" => $item["sys_id"],
                "first_name" => !empty($item["client"]) ? $item["client"]["first_name"] : null,
                "last_name" => !empty($item["client"]) ? $item["client"]["last_name"] : null,
                "loan_amount" => $item["loan_amount"],
                "company" => !empty($item["company"]) ? $item["company"]["name"] : null,
                "disbursement_date" => $item["disbursement_date"],
                "repayment_period" => $item["repayment_period"],
                "case_status"     => app("utils")->caseStatus($item["case_status"]),
            ];
        }, array_keys($caseTable),array_values($caseTable));
        return $data;
    }
    /**
     * view case detail with disable some of part
     */
    public function details($id)
    {
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
        //渲染页面 和 数据
        return view('public.pages.loanDetailsWithDisable', [
            'data' => $data,
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
    /**
     * approval page edit case 
     */
    public function edit(IndividualApprovalEdit $request,$id)
    {
        $case = Cases::find($this->decryptID($id));
        $client = Client::find($case->client_id);
        $client->appellation = $request["appellation"];
        $client->area = $request["area"];
        $client->job_status = $request["job_status"];
        $client->save();
        $case->purpose = $request["purpose"];
        $case->case_remark = $request["case_remark"];
        $case->save();
        return $client->wasChanged() || $case->wasChanged() ? ["success" => "updated success"] : ["failed" => "no update"];
    }
}
