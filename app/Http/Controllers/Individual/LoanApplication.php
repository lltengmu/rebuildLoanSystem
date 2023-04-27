<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use Illuminate\Http\Request;

class LoanApplication extends Controller
{
    public function index()
    {
        return view('pages.individual.loanApplication');
    }
    /**
     * @return dataTable data source
     */
    public function cases()
    {
        //读取数据
        $caseTable = Cases::with("company:id,name")->with("client:id,first_name,last_name")->select([
            'id',
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
        $data = array_map(function ($item) {
            return [
                "id" => $item["id"],
                "first_name" => !empty($item["client"]) ? $item["client"]["first_name"] : null,
                "last_name" => !empty($item["client"]) ? $item["client"]["last_name"] : null,
                "loan_amount" => $item["loan_amount"],
                "company" => !empty($item["company"]) ? $item["company"]["name"] : null,
                "disbursement_date" => $item["disbursement_date"],
                "repayment_period" => $item["repayment_period"],
                "create_datetime" => $item["create_datetime"],
                "case_status"     => $item["case_status"],
                "operate"         => "111"
            ];
        }, $caseTable);
        return $data;
    }
}
