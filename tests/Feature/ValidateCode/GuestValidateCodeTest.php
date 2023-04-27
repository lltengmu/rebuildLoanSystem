<?php

namespace Tests\Feature\ValidateCode;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestValidateCodeTest extends TestCase
{
    /**
     * 发送邮件验证码
     *
     * @test
     */
    public function emailVerificationCode()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/code/guest',[
            'account' => $user->email
        ]);

        $response->assertOk();
    }

    /**
     * 发送手机验证码
     * 
     * @test
     */
    public function sendMobilePhoneVerificationCode()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/code/guest',[
            'account' => config('hd.mobile') 
        ]);

        $response->assertOk();
    }
    /**
     * 游客登录邮箱格式错误
     * @test
     */
    public function emailFormatError()
    {
        $response = $this->post('/api/code/guest',[
            'account' => 'dbjsa'
        ]);
        $response->assertSessionHasErrors('account');
    }
    /**
     * 重复发送验证码
     * @test
     */
    public function repeatSendVirificationCode()
    {
        $user = User::factory()->make();
        $this->post('/api/code/guest',[
            'account' => $user->email,
        ]);
        $this->post('/api/code/guest',[
            'account' => $user->email,
        ])->assertStatus(403);

    }
}
