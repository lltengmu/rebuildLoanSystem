<?php

namespace App\Http\Controllers\Individual;

use App\Exports\ExportCaseAll;
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
        return view('pages.individual.loanApplication',[
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" =>$company
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
                "create_datetime" => $item["create_datetime"],
                "case_status"     => $item["case_status"],
            ];
        }, array_keys($caseTable),array_values($caseTable));
        return $data;
    }
    /**
     * download case as excel
     */
    public function exportCaseItem($id)
    {
        //定义文件名
        $fileName = "loanSystem-loan-record-" . date("YmdHis") . ".xlsx";
        //定义表头
        $header = ["ID","名字","姓氏","貸款額","付款日期","付款方式","還款期","共同簽字人姓名","共同簽字人姓氏","提交至服務提供商","狀態"];
        //获取导出的 case 数据
        $case = Cases::with('company:id,name')
            ->with('client:id,last_name,first_name')
            ->with('LboCaseStatus:id,label_tc')
            ->where('id', $this->decryptID($id))
            ->select([
                "id",
                "client_id",
                "company_id",
                "case_status",
                "loan_amount",
                "disbursement_date",
                "payment_method",
                "repayment_period",
                "co_signer_first_name",
                "co_signer_last_name",
                "status"
            ])
            ->get()
            ->toArray();
        return Excel::download(new ExportCaseItem($header,$case[0]), $fileName);
    }
    /**
     * export all case as excel
     */
    public function exportAll()
    {
        $case = Cases::with('company:id,name')
            ->with('client:id,last_name,first_name')
            ->with('LboCaseStatus:id,label_tc')
            ->select([
                "id",
                "client_id",
                "company_id",
                "case_status",
                "loan_amount",
                "disbursement_date",
                "payment_method",
                "repayment_period",
                "co_signer_first_name",
                "co_signer_last_name",
                "status"
            ])
            ->get()
            ->toArray();
        //定义文件名
        $fileName = "loanSystem-all-loan-record" . date("YmdHis") . ".xlsx";
        //定义表头
        $head = ["ID", "名字", "姓氏", "貸款額", "付款日期", "付款方式", "還款期", "共同簽字人姓名", "共同簽字人姓氏", "提交至服務提供商", "狀態"];
        //处理excel表数据
        $data = array_map(function ($item) {
            return [
                $item["id"],
                $item["client"]["first_name"] ?? "",
                $item["client"]["last_name"] ?? "",
                $item["loan_amount"] ?? "",
                $item["disbursement_date"] ?? "",
                $item["payment_method"] ?? "",
                $item["repayment_period"] ?? "",
                $item["co_signer_first_name"] ?? "",
                $item["co_signer_last_name"] ?? "",
                $item["company"]["name"] ?? "",
                $item["lbo_case_status"]["label_tc"] ?? "",
            ];
        }, $case);
        return Excel::download(new ExportCaseAll($data, $head), $fileName);
    }
    public function clientExits(ClientExitsRequest $request)
    {
        //已经过表单验证
        return ['success' => "沒有此用戶，請爲新用戶創建貸款"];
    }
    public function uploadExcel(Request $request)
    {
        $file = $request->file("file");
        Excel::import(new ImportExcel,$file);
        //执行到这里说明已经导入成功，不然会报错
        return ['success' => "import successful"];
    }
}
