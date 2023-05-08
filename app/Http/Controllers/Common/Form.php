<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanFormRequest;
use App\Models\Cases;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;

class Form extends Controller
{
    public function index(LoanFormRequest $request)
    {
        if ($request->isMethod('post')) {
            //新增client 并且添加一条贷款记录
            $case = new Cases([]);
            return ["success" => 111];
        } else {
            $appellations = LboAppellations::all();
            $area = LboDistrict::all();
            $job = LboEmployment::all();
            $purpose = LboLoanPurpose::all();
            $company = Company::all();
            return view("public.pages.new-Application", [
                "appellations" => $appellations,
                "area" => $area,
                "job"  => $job,
                "purpose" => $purpose,
                "company" => $company
            ]);
        }
    }
}
