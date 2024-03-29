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
use Jenssegers\Agent\Agent;

class Form extends Controller
{
    public function index(LoanFormRequest $request)
    {
        if ($request->isMethod('post')) {
            //获取表单数据
            $data = $request->all();
            $agent = new Agent();
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
                "browser"         => $agent->browser(),
                "platform"      => $agent->platform(),
                "device"        => $agent->device()
            ]);
            $client->update_by = "client_".$client->id;
            $client->save();
            //新增case并建立关联关系
            $insertCase = new Cases([
                "loan_amount" => $data["loan_amount"],
                "repayment_period" => $data["repayment_period"],
                "purpose"          => $data["purpose"],
            ]);
            $case = $client->cases()->save($insertCase);
            return $this->success(message:"建立贷款成功",data:null);
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
