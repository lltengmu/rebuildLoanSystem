<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovalRequest;
use App\Http\Requests\RefuseRequest;
use App\Models\Cases;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ApprovalManagement extends Controller
{
    public function index()
    {
        return view("pages.serviceProvider.approvalManagment");
    }
    /**
     * 当前服务提供商所属机构
     * @test
     */
    private function theCurrentServiceProvidersToTheSector()
    {
        return ServiceProvider::where("email", session("email"))->first()->value("company_id");
    }
    /**
     * pending数据表格数据
     * @return void
     */
    public function pending()
    {
        $cases = Cases::with("company:id,name")
            ->with("client:id,first_name,last_name")
            ->where("company_id", $this->theCurrentServiceProvidersToTheSector())
            ->whereIn("case_status", [2])
            ->select([
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
        return $this->success(message: "数据获取成功", data: $data);
    }
    /**
     * approval & reject 数据表格数据
     * @return void
     */
    public function approvalList()
    {
        $cases = Cases::with("company:id,name")
            ->with("client:id,first_name,last_name")
            ->where("company_id", $this->theCurrentServiceProvidersToTheSector())
            ->whereIn("case_status", [3, 4, 5])
            ->select([
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
        return $this->success(message: "数据获取成功", data: $data);
    }
    /**
     * reject(驳回) api
     * @return json
     */
    public function reject(Request $request, $id)
    {
        Cases::find($this->decryptID($id))->update(
            [
                "case_status" => 1,
                "update_by" => session("_user_info.identify") . "_" . session("_user_info.user_id")
            ]
        );
        return $this->success(message: "操作成功", data: null);
    }
    /**
     * approval(同意) api
     * @return json
     */
    public function approval(ApprovalRequest $request, $id)
    {
        Cases::find($this->decryptID($id))->update(
            [
                "case_status" => 4,
                "update_by" => session("_user_info.identify") . "_" . session("_user_info.user_id"),
            ] + $request->input()
        );
        return $this->success(message: "操作成功", data: null);
    }
    /**
     * withdraw opration
     * @return json
     */
    public function withdraw($id)
    {
        Cases::find($this->decryptID($id))->update(
            [
                "case_status" => 2,
                "update_by" => session("_user_info.identify") . "_" . session("_user_info.user_id")
            ]
        );
        return $this->success(message: "操作成功", data: null);
    }
    /**
     * refuse(拒绝) api
     * @return json
     */
    public function refuse(RefuseRequest $request, $id)
    {
        Cases::find($this->decryptID($id))->update(
            [
                "case_status" => 5,
                "update_by" => session("_user_info.identify") . "_" . session("_user_info.user_id")
            ] + $request->input()
        );
        return $this->success(message: "操作成功", data: null);
    }
}
