<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use App\Models\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class CasesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $clientsIdList = Client::select('id')->get();
        $serciceProviderIDList = ServiceProvider::select('id')->get();
        $paymentMethods = ["wechat","aliyun"];
        return [
            'client_id' => $this->faker->randomElement($clientsIdList),
            'case_status' => $this->faker->randomElement([1,2,3,4,5]),
            'company_id' => mt_rand(1,2),
            'service_provider_id' =>$this->faker->randomElement($serciceProviderIDList),
            'loan_amount' => mt_rand(1,10000),
            'payment_amount' => mt_rand(1,10000),
            'payment_method' =>$this->faker->randomElement($paymentMethods),
            'purpose' => mt_rand(1,3),
            'case_remark' => $this->faker->realText(),
            'disbursement_date' => date('Y-m-d h:i:s'),
            'repayment_period' => mt_rand(1,24),
            'status' => mt_rand(1,5),
            'co_signer_first_name' => $this->faker->firstName(),
            'co_signer_last_name' => $this->faker->lastName(),
        ];
    }
}
