<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCasesRequest;
use App\Http\Requests\UpdateCasesRequest;
use Illuminate\Http\Request;

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
    public function update(Request $request,$id)
    {
        //模拟延迟
        sleep(1);
        //前端需要提供一个update数组,数组中只有一个对象 对象中记录需要更新哪些字段. 实现动态更新数据 
        $resoult = Cases::where('id',$id)->update(...$request->update);
        return $resoult ? ["success"=>"updated success"] : ["error" => "no case updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cases  $cases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cases $cases)
    {
        //
    }
}
