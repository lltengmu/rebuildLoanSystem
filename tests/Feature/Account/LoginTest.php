<?php

namespace Tests\Feature\Account;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    protected $data = [
        'account'   => '1150970484@qq.com',
        'passsword' => 'admin-888'
    ];
    /**
     * 登录
     *@test
     */
    public function userLogin()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login',['account' => $user->email,'password' => 'admin-888']);
        $response->assertSee('token');
    }
    
    /**
     * 邮箱合法性验证
     * @test
     */
    public function loginAccountRule()
    {
        $response = $this->post('/api/login',['account' => 'hd','password' => 'admin-888']);
        $response->assertSessionHasErrors('account');//断言是否返回关于email的验证错误session
    }

    /**
     * 邮箱必填性验证
     * @test
     */
    public function loginRequiredRule()
    {
        $response = $this->post('api/login',['password' => 'admin-888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 邮箱输入错误验证
     * @test
     */
    public function passwordPostWrong()
    {
        //先在数据库生成一条测试数据
        $user = User::factory()->create();
        //发起测试请求
        $response = $this->post('api/login',['account' => $user->email,'password' => '845']);
        $response->assertSessionHasErrors('password');
    }

    /**
     * 邮箱不存在
     * @test
     */
    public function accountNotExists()
    {
        //输入一个错误的邮箱用于验证接口是否返回错误信息，返回错误信息则测试通过
        $response = $this->post('api/login',['account' => '124@qq.com','password' => 'admin-888']);
        $response->assertSessionHasErrors('account');
    }

    /**
     * 手机号登录
     * @test
     */
    public function loginByMobile()
    {
        $user = User::factory()->create(['mobile' =>'18172686468']);
        $response = $this->post('api/login',['account' => $user->mobile,'password' => 'admin-888']);
        $response->assertOk();
    }
}
