<?php

namespace App\Http\Controllers\Auth;

use App\Events\LoginEvent;
use App\Events\LogoutEvent;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Service\UtilsService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public $user;

    public function __invoke(LoginRequest $request, $identify,UtilsService $utilsService)
    {

        if (request()->isMethod("post")) {
            
            $agent = new Agent();
            //根据用户身份进行查询
            $user = $utilsService->getUserModel($identify,$request["email"]);

            //  密码输入验证
            if (sha1($request["password"]) !== $user->password) throw ValidationException::withMessages(['email' => '错误的账号或者密码', 'password' => '错误的账号或者密码']);
            //用户账号是否被禁用
            if ($user->status == 0) throw ValidationException::withMessages(['email' => '此賬號被禁用']);

            //定义用户相关的session数组
            $user_array = [
                'user_id' => $user->id,
                'full_name' => $user->last_name . $user->first_name,
                'identify' => $identify,
            ];

            //存储session
            session()->put(['_user_info' => $user_array, 'email' => $user->email]);

            //一些需要存储的信息
            $equipmentInformation = [
                "ip" => $request->ip(),
                "platform" => $agent->platform(),
                "browser" => $agent->browser(),
                "device" => $agent->device(),
            ];

            $user->update($equipmentInformation);
            //触发登录事件
            event(new LoginEvent($user,$identify,$equipmentInformation));

            return $this->success(
                message: "登录成功",
                data: [
                    "token" => $user->createToken("auth")->plainTextToken
                ]
            );
        }
        return view("login.{$identify}-login");
    }
    /**
     * user exit Controller
     * @return redirect
     */
    public function logout(UtilsService $utilsService)
    {
        //读取当前登录用户的email
        $email = session("email");
        //获取当前用户的身份
        $identify = session()->get("_user_info.identify");
        //获取当前用户模型
        $user = $utilsService->getUserModel($identify,$email);
        //清除session
        // session()->forget("_user_info");
        // session()->forget("email");
        Session::flush();
        //触发用户退出事件
        event(new LogoutEvent($user));
        return redirect("/{$identify}/login");
    }
}
