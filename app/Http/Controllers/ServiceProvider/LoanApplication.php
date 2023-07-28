<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Company;
use App\Exports\Export;
use App\Models\LboAppellations;
use App\Imports\ImportExcel;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LoanApplication extends Controller
{
    public function index()
    {
        $appellations = LboAppellations::all();
        $area = LboDistrict::all();
        $job = LboEmployment::all();
        $purpose = LboLoanPurpose::all();
        $company = Company::all();
        return view("pages.serviceProvider.loanApplication", [
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
    public function cases()
    {
         //读取数据
         $cases = Cases::with("company:id,name")->with("client:id,first_name,last_name")->select([
            'id',
            'sys_id',
            'client_id',
            'company_id',
            'loan_amount',
            'case_status',
            'disbursement_date',
            'repayment_period',
            'status',
            'created_at'
        ])->get()->toArray();

         //数据处理
         $data = array_map(function ($key, $item) {
            return [
                "num" => $key + 1,
                "id" => $item["sys_id"],
                "first_name" => !empty($item["client"]) ? $item["client"]["first_name"] : null,
                "last_name" => !empty($item["client"]) ? $item["client"]["last_name"] : null,
                "loan_amount" => $item["loan_amount"],
                "company" => !empty($item["company"]) ? $item["company"]["name"] : null,
                "disbursement_date" => $item["disbursement_date"],
                "repayment_period" => $item["repayment_period"],
                "created_at" => $item["created_at"],
                "case_status"     => app("utils")->caseStatus($item["case_status"]),
            ];
        }, array_keys($cases), array_values($cases));
        return $this->success(message:"数据获取成功",data:$data);
    }
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
        return view('public.pages.spViewCaseDetails', [
            'data' => $data,
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
     /**
     * import excel
     */
    public function uploadExcel(Request $request)
    {
        //获取文件
        $file = $request->file("file");
        //导入文件
        Excel::import(new ImportExcel, $file);
        //执行到这里说明已经导入成功，不然会报错
        return $this->success(message:"导入成功",data:null);
    }
}
