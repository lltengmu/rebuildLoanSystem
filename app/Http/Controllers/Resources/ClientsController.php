<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Exports\Export;
use App\Http\Requests\IndividualCreateCaseForClient;
use App\Http\Requests\LoanFormRequest;
use App\Models\Cases;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $data = Client::select(["sys_id", "first_name", "last_name", "nationality", "email", "mobile", "status"])->get()->toArray();
        //数据处理
        return array_map(function ($key, $item) {
            return $item + ["num" => $key + 1, "id" => $item["sys_id"]];
        }, array_keys($data), array_values($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IndividualCreateCaseForClient $request)
    {
        $client = Client::create([
            "appellation" => $request["appellation"],
            "first_name" => $request["first_name"],
            "last_name" => $request["last_name"],
            "mobile" => $request["mobile"],
            "email" => $request["email"],
            "nationality" => $request["nationality"],
            "date_of_birth" => $request["date_of_birth"],
            "unit" => $request["unit"],
            "floor" => $request["floor"],
            "building" => $request["building"],
            "addressOne" => $request["addressOne"],
            "addressTwo" => $request["addressTwo"],
            "area" => $request["area"],
            "HKID" => $request["HKID"],
            "job_status" => $request["job_status"],
            "salary" => $request["salary"],
            "company_name" => $request["company_name"],
            "company_contact" => $request["company_contact"],
            "company_addres" => $request["company_addres"],
        ]);
        $case = new Cases([
            "loan_amount" => $request["loan_amount"],
            "repayment_period" => $request["repayment_period"],
            "purpose" => $request["purpose"],
            "company_id" => $request["company_id"]
        ]);
        $client->cases()->save($case);
        return ["success" => "add success"];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //模拟延迟
        sleep(1);
        //前端需要提供一个update数组,数组中只有一个对象 对象中记录需要更新哪些字段. 实现动态更新数据 
        $resoult = Client::where('id', $this->decryptID($id))->update(...$request->update);
        return $resoult ? ["success" => "updated success"] : ["error" => "no case updated"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($this->decryptID($id));
        $data = Client::find($this->decryptID($id));
        return is_null($data) ? ['success' => "删除成功"] : ['error' => "删除失败"];
    }
    /**
     * export client information
     */
    public function exportClientInformation($id)
    {
        //定义文件名
        $fileName = "貸款用戶信息-" . date("YmdHis") . ".xlsx";
        //定义表头
        $header = ["ID", "電郵", "名字", "姓氏", "HKID", "出生日期", "電話", "國籍", "地區", "地址", "建築", "樓層", "單元", "公司名稱", "公司聯絡人", "公司地址"];
        //获取数据
        $case = Client::where('id', $this->decryptID($id))
            ->select([
                "id",
                "email",
                "first_name",
                "last_name",
                "HKID",
                "date_of_birth",
                "mobile",
                "nationality",
                "area",
                "addressOne",
                "building",
                "floor",
                "unit",
                "company_name",
                "company_contact",
                "company_addres"
            ])
            ->get()
            ->toArray();
        //数据处理
        $data = array_map(function ($item) {
            return [
                $item["id"],
                $item["email"] ?? "",
                $item["first_name"] ?? "",
                $item["last_name"] ?? "",
                $item["HKID"] ?? "",
                $item["date_of_birth"] ?? "",
                $item["mobile"] ?? "",
                $item["nationality"] ?? "",
                $item["area"] ?? "",
                $item["addressOne"] ?? "",
                $item["building"] ?? "",
                $item["floor"] ?? "",
                $item["unit"] ?? "",
                $item["company_name"] ?? "",
                $item["company_contact"] ?? "",
                $item["company_addres"] ?? "",
            ];
        }, $case);
        return Excel::download(new Export($data, $header), $fileName);
    }
    /**
     * export all
     */
    public function exportAll()
    {
        //定义文件名
        $fileName = "所有貸款用戶信息-" . date("YmdHis") . ".xlsx";
        //定义表头
        $header = ["ID", "電郵", "名字", "姓氏", "HKID", "出生日期", "電話", "國籍", "地區", "地址", "建築", "樓層", "單元", "公司名稱", "公司聯絡人", "公司地址"];
        //获取数据
        $case = Client::select([
                "id",
                "email",
                "first_name",
                "last_name",
                "HKID",
                "date_of_birth",
                "mobile",
                "nationality",
                "area",
                "addressOne",
                "building",
                "floor",
                "unit",
                "company_name",
                "company_contact",
                "company_addres"
            ])
            ->get()
            ->toArray();
        //数据处理
        $data = array_map(function ($item) {
            return [
                $item["id"],
                $item["email"] ?? "",
                $item["first_name"] ?? "",
                $item["last_name"] ?? "",
                $item["HKID"] ?? "",
                $item["date_of_birth"] ?? "",
                $item["mobile"] ?? "",
                $item["nationality"] ?? "",
                $item["area"] ?? "",
                $item["addressOne"] ?? "",
                $item["building"] ?? "",
                $item["floor"] ?? "",
                $item["unit"] ?? "",
                $item["company_name"] ?? "",
                $item["company_contact"] ?? "",
                $item["company_addres"] ?? "",
            ];
        }, $case);
        return Excel::download(new Export($data, $header), $fileName);
    }
}
