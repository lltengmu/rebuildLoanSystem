<?php

namespace App\Http\Controllers\Basic;

use App\Events\Logout;
use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, $identify)
    {
        return $this->$identify($request);
    }
    private function individual($request)
    {
        if (request()->isMethod('post')) {
            //验证已通过 开始检查传入的数据
            $user = Individuals::where(['email' => $request->email, 'password' => sha1($request->password)])->first();

            //匹配密码是否正确
            if (!$user) throw ValidationException::withMessages(['email' => '錯誤的帳號或密碼', 'password' => "錯誤的帳號或密碼"]);

            //用户账号是否被禁用
            if ($user->status == 0) throw ValidationException::withMessages(['email' => '此賬號被禁用']);

            //定义session数组
            $user_array = [
                'user_id' => $user->id,
                'full_name' => $user->last_name . $user->first_name,
                'identify' => 'individual',
            ];
            //存储session
            session()->put(['_user_info' => $user_array, 'email' => $user->email]);

            return ['success' => 'login success'];
        }
        return view('login.individual-login');
    }
    private function clients($request)
    {
        if (request()->isMethod('post')) {
            //验证已通过 开始检查传入的数据
            $user = Client::where(['email' => $request->email, 'password' => sha1($request->password)])->first();
            //匹配密码是否正确
            if (!$user) throw ValidationException::withMessages(['email' => '錯誤的帳號或密碼', 'password' => "錯誤的帳號或密碼"]);
            //用户账号是否被禁用
            if ($user->status == 0) throw ValidationException::withMessages(['email' => '此賬號被禁用']);
            //定义session数组
            $user_array = [
                'user_id' => $user->id,
                'full_name' => $user->last_name . $user->first_name,
                'identify' => 'clients',
            ];
            //存储session
            session()->put(['_user_info' => $user_array, 'email' => $user->email]);

            return ['success' => 'login success'];
        }
        return view('login.clients-login');
    }
    private function serviceProvider()
    {
        return view('login.serviceProvider-login');
    }
    public function logout()
    {
        $email = session("email");
        $identify = session()->get("_user_info.identify");
        session()->forget("_user_info");
        session()->forget("email");
        event(new Logout($identify,$email));
        return redirect("/{$identify}/login");
    }
}
