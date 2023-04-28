<?php

namespace App\Exports;

use App\Models\Cases;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportCaseItem implements FromCollection, WithHeadings, WithMapping
{

    protected $data;

    protected $header;

    public function __construct(array $header,array $data)
    {
        $this->header = $header;
        $this->data = $data;
    }
    public function headings(): array
    {
        return $this->header;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function map($row):array
    {
        return [
            $row["id"],
            $row["client"]["first_name"] ?? "",
            $row["client"]["last_name"] ?? "",
            $row["loan_amount"] ?? "",
            $row["disbursement_date"] ?? "",
            $row["payment_method"] ?? "",
            $row["repayment_period"] ?? "",
            $row["co_signer_first_name"] ?? "",
            $row["co_signer_last_name"] ?? "",
            $row["company"]["name"] ?? "",
            $row["lbo_case_status"]["label_tc"],
        ];
    }
    public function collection()
    {
        return collect([$this->data]);
    }
}
