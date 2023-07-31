<?php

namespace Database\Seeders;

use App\Models\LoanTemplate;
use Illuminate\Database\Seeder;

class LoanTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "title" => "默认模版",
            "template_image" => "/images-default/loan_template.jpeg",
            "template_text" => "Citi特快現金讓您隨時擁有額外現金，還可享受低至1.38%°的實際年利率。(按此了解私人貸款產品資料概要。",
            "update_by" => "individual@qq.com"
        ];
        LoanTemplate::updateOrCreate($data);
    }
}
