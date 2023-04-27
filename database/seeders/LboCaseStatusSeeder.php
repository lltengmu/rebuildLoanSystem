<?php

namespace Database\Seeders;

use App\Models\LboCaseStatus;
use Illuminate\Database\Seeder;

class LboCaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ "shortt_code" => "submitted","label_tc" => "提交","label_en" => "submitted" ],
            [ "shortt_code" => "pass_to_sp","label_tc" => "轉交到服務提供者","label_en" => "pass_to_sp" ],
            [ "shortt_code" => "approved_by_sp","label_tc" => "服務提供者同意","label_en" => "approved_by_sp" ],
            [ "shortt_code" => "success","label_tc" => "申請成功","label_en" => "success" ],
            [ "shortt_code" => "fail","label_tc" => "申請失敗","label_en" => "fail" ],
        ];
        foreach($data as $item):
            LboCaseStatus::updateOrCreate($item);
        endforeach;
    }
}
