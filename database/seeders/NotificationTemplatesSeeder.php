<?php

namespace Database\Seeders;

use App\Models\NotificationTemplates;
use Illuminate\Database\Seeder;

class NotificationTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "category" => "agreed_loan",
                "title" => "FG Loan",
                "content" => "Dear [first_name] [last_name],Please confirm the personal infomation, and advise consent for referring to [name].",
            ],
            [
                "category" => "admin_add_loan",
                "title" => "Dear [first_name] [last_name]",
                "content" => "Dear [first_name] [last_name],Admin added a loan for you, please check.Thanks.",
            ],
            [
                "category" => "client_create",
                "title" => "Dear [first_name] [last_name]",
                "content" => "You have created a loan account. Please set your password.",
            ],
        ];
        foreach ($data as $item) :
            NotificationTemplates::updateOrCreate($item);
        endforeach;
    }
}
