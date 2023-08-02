<?php

namespace App\Imports;

use App\Models\Cases;
use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportExcel implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $rows = $rows->toArray();

        foreach ($rows as $key => $row) {
            
            if ($key == 0 || $row[1] == "") continue;
            //提取存储到clients表的数据
            $clientData = [
                "appellation" => app("utils")->appellation($row[0]),
                "first_name" => $row[1],
                "last_name" => $row[2],
                "HKID" => $row[3],
                "mobile" => $row[14],
                "nationality" => $row[15],
                "unit" => $row[16],
                "floor" => $row[17],
                "building" => $row[18],
                "addressOne" => $row[19],
                "addressTwo" => $row[20],
                "area" => app("utils")->area($row[21]),
                "job_status" => app("utils")->jobStatus($row[22]),
                "salary" => $row[23],
                "company_name" => $row[24],
                "company_contact" => $row[25],
                "company_addres" => $row[26],
                "date_of_birth" => $row[28]
            ];
            //提取存储到cases表的数据
            $caseData = [
                "loan_amount" => $row[5],
                "payment_amount" => $row[6],
                "disbursement_date" => $row[7],
                "payment_method" => $row[8],
                "repayment_period" => $row[9],
                "co_signer_first_name" => $row[10],
                "co_signer_last_name" =>  $row[11],
                "company_id" => app('utils')->company($row[12]),
                "case_status" =>app("utils")->caseStatus($row[13]),
                "purpose" => app("utils")->purpose($row[27]),
            ];

            //更新客户数据或者新增客户
            $client = Client::updateOrCreate(
                ["email" => $row[4]],
                $clientData
            );
            //更新关联表数据
            $client->cases()->create($caseData);
        }
    }
}
