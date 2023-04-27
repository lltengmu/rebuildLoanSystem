<?php

namespace Tests\Feature\Account;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /*
     * RefreshDatabase 执行完单元测试之后会对数据库进行初始化(清空数据表)
     */
    use RefreshDatabase;
    protected function data(){
        $user = User::factory()->make();
        //清除验证码缓存
        app('code')->clear($user->email);
        return [
            'account'  => $user->email,
            'password' => 'admin-888',
            'password_confirmation' => 'admin-888',
            'code' =>app('code')->email($user->email)
        ];
    }
    /**
     * 用户注册
     *@test
     */
    public function userRegister()
    {
        $response = $this->post('api/register',$this->data());
        $response->assertOk();
    }
    /**
     * 邮箱合法性验证
     *@test
     */
    public function registerAccountValidate()
    {
        $response = $this->post('api/register',['account' => 'hd'] + $this->data());
        //assertSessionHasErrors 断言session中是否包含对email字段验证错误信息 为true则测试通过
        $response->assertSessionHasErrors('account');
    }

    /**
     * 邮箱必填性验证
     * 在注释中使用@test 则函数名不需要test_前缀,否则需要前缀单元测试才会被运行 
     *@test
     */
    public function accountRequiredValidate()
    {
        //单元测试通过与否是根据断言来决定的，比如当我们运行测试的时候需要api返回错误，切api正常返回我们预期的错误，则单元测试通过
        $data = $this->data();
        unset($data['account']);
        $response = $this->post('api/register',$data);
        $response->assertSessionHasErrors('account');
    }

    /**
     *邮箱唯一性验证
     *@test
     */
    public function accountUniqueValidate()
    {
        $data = $this->data();
        $response = $this->post('api/register',$data);
        $response2 = $this->post('api/register',$data);
        $response2->assertSessionHasErrors('account');
    }
    /**
     * 确认密码输入错误
     * @test
     */
    public function determineTheErrorOutputPassword()
    {
        $response = $this->post('api/register',['password' => 'abcd'] + $this->data());
        $response->assertSessionHasErrors('password');
    }

    /**
     * 验证码输入错误
     * @test
     */
    public function captchaInputError()
    {
        $response = $this->post('api/register',['code' => 'fsad'] + $this->data());
        $response->assertSessionHasErrors('code');
    }

}
