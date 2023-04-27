<?php

namespace Tests\Unit;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class SmsServiceTest extends TestCase
{
    /**
     * 发送短信
     *
     * @test
     */
    public function sendMobileMessage()
    {
        $response = app('sms')->send(config('hd.mobile'),'SMS_154950909',[
            'code' => '888888'
        ]);
        //dd($response);
        $this->assertTrue(isset($response['aliyun']));
    }
}
