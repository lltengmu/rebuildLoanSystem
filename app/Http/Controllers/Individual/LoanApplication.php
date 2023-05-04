<?php

namespace App\Http\Controllers\Individual;

use App\Exports\Export;
use App\Http\Controllers\Controller;
use App\Models\Cases;
use Illuminate\Http\Request;
use App\Exports\ExportCaseItem;
use App\Http\Requests\ClientExitsRequest;
use App\Imports\ImportExcel;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
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
        return view('pages.individual.loanApplication', [
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
    /**
     * @return dataTable data source
     */
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
            'create_datetime'
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
                "create_datetime" => $item["create_datetime"],
                "case_status"     => $item["case_status"],
            ];
        }, array_keys($caseTable), array_values($caseTable));
        return $data;
    }
    /**
     * query client is exits
     */
    public function clientExits(ClientExitsRequest $request)
    {
        //已经过表单验证
        return ['success' => "沒有此用戶，請爲新用戶創建貸款"];
    }
    /**
     * import excel
     */
    public function uploadExcel(Request $request)
    {
        $file = $request->file("file");
        Excel::import(new ImportExcel, $file);
        //执行到这里说明已经导入成功，不然会报错
        return ['success' => "import successful"];
    }
}
