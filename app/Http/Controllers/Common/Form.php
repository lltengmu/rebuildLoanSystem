<?php

namespace App\Http\Controllers\Common;

use App\Events\ClientCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoanFormRequest;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Form extends Controller
{
    public function index(LoanFormRequest $request)
    {
        if ($request->isMethod('post')) {
            //获取表单数据
            $data = $request->all();
            //新增client 并且添加一条贷款记录
            $client = Client::create([
                "first_name"    => $data["first_name"],
                "last_name"     => $data["last_name"],
                "appellation"   => $data["appellation"],
                "HKID"          => $data["HKID"],
                "date_of_birth" => $data["date_of_birth"],
                "mobile"        => $data["mobile"],
                "email"         => $data["email"],
                "nationality"   => $data["nationality"],
                "area"          => $data["area"],
                "addressOne"    => $data["addressOne"],
                "addressTwo"    => $data["addressTwo"],
                "building"      => $data["building"],
                "floor"         => $data["floor"],
                "unit"          => $data["unit"],
                "job_status"    => $data["job_status"],
                "salary"        => $data["salary"],
                "company_name"  => $data["company_name"],
                "company_contact"=> $data["company_contact"],
                "company_addres" => $data["company_addres"],
                "ip"              => $request->ip(),
                "browser"         => app("utils")->browser($request->header("User-Agent"))
            ]);
            //触发事件
            event(new ClientCreated($client,"client_create"));
            $insertCase = new Cases([
                "loan_amount" => $data["loan_amount"],
                "repayment_period" => $data["repayment_period"],
                "purpose"          => $data["purpose"],
            ]);
            $case = $client->cases()->save($insertCase);
            $case->save([
                "sys_id" => Crypt::encrypt($case->id)
            ]);
            return ["success" => "register success"];
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
