<?php

namespace App\Exports;

use App\Models\Cases;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportCaseAll implements FromArray, WithHeadings
{
    use Exportable;
    
    protected $data;
    protected $header;

    public function __construct(array $data,array $header)
    {
        $this->data = $data;
        $this->header = $header;
    }
    public function headings(): array
    {
        return $this->header;
    }
    public function array():array
    {
        return $this->data;
    }
}
