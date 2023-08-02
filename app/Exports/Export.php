<?php

namespace App\Exports;

use App\Events\ExportEvent;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;

class Export implements FromArray, WithHeadings
{
    use Exportable;
    
    protected $data;
    protected $header;

    public function __construct(array $data,array $header)
    {
        $cases_ids = array_map(function($item){
            return $item[0];
        },$data);

        $logInfo = [
            "user_id" => session("_user_info.user_id"),
            "cases_id" => $cases_ids,
            "when" => date("Y-m-d H:m:s"),
            "update_by" => session("_user_info.identify")."_".session("_user_info.user_id")
        ];
        //触发 export 事件
        event(new ExportEvent($logInfo));
        
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
