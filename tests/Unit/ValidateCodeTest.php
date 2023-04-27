<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

//use PHPUnit\Framework\TestCase;

class ValidateCodeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 测试邮件验证码
     *
     * @test
     */
    public function emailVerificationCode()
    {
        //生成一个用户
        $user = User::factory()->make();
        //使用服务调用，发送验证码
        $code = app('code')->email($user->email);
        //断言两个变量相等
        $this->assertEquals(Cache::get($user->email),$code);
    }
}
