<?php

namespace App\Http\Controllers\Resources;

use App\Models\Cases;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCasesRequest;
use App\Http\Requests\UpdateCasesRequest;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cases::with(['client' => function ($query) {
            $query->select([
                'id',
                "first_name",
                "last_name",
                "appellation",
                "password",
                "HKID",
                "date_of_birth",
                "marital_status",
                "mobile",
                "email",
                "nationality",
                "area",
                "addres",
                "addressOne",
                "addressTwo",
                "building",
                "floor",
                "unit",
                "job_status",
                "salary",
                "company_name",
                "company_addres",
                "create_datetime",
                "update_datetime",
                "last_login_datetime",
                "status"
            ]);
        }])
            ->with('company:id,name')
            ->with('LboCaseStatus:id,label_tc,label_en')
            ->select([
                'id',
                'sys_id',
                'client_id',
                'case_status',
                'company_id',
                'loan_amount',
                'payment_amount',
                'purpose',
                'case_remark',
                'disbursement_date',
                'repayment_period',
                'status',
                'create_datetime'
            ])
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCasesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCasesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function show(Cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function edit(Cases $cases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCasesRequest  $request
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //模拟延迟
        sleep(1);
        //前端需要提供一个update数组,数组中只有一个对象 对象中记录需要更新哪些字段. 实现动态更新数据 
        $resoult = Cases::where('id', $this->decryptID($id))->update(...$request->update);
        return $resoult ? ["success" => "updated success"] : ["error" => "no case updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cases::destroy($this->decryptID($id));
        $data = Cases::find($this->decryptID($id))->toArray();
        return empty($data) ? ['success' => "删除成功"] : ['error' => "删除失败"];
    }
    /**
     * view case details
     * @param id
     */
    public function loanApplicationDetail($id)
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
        return view('public.pages.loanDetails', [
            'data' => $data,
            "appellations" => $appellations,
            "area" => $area,
            "job"  => $job,
            "purpose" => $purpose,
            "company" => $company
        ]);
    }
}
