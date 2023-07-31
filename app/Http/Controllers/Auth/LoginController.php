<?php

namespace App\Http\Controllers\Auth;

use App\Events\Logout;
use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, $identify)
    {

        if (request()->isMethod("post")) {
            $agent = new Agent();
            //根据用户身份进行查询
            switch ($identify):
                case "individual":
                    $user = Individuals::where("email", $request["email"])->first();
                    break;
                case "clients":
                    $user = Client::where("email", $request["email"])->first();
                    break;
                case "sp":
                    $user = ServiceProvider::where("email", $request["email"])->first();
                    break;
            endswitch;

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

            $user->update(
                [
                    "ip" => $request->ip(),
                    "platform" => $agent->platform(),
                    "browser" => $agent->browser(),
                    "device" => $agent->device(),
                ]
            );

            return $this->success(
                message: "登录成功",
                data: [
                    "token" => $user->createToken("auth")->plainTextToken
                ]
            );
        }
        return view("login.{$identify}-login");
    }
    public function logout()
    {
        $email = session("email");
        $identify = session()->get("_user_info.identify");
        session()->forget("_user_info");
        session()->forget("email");
        event(new Logout($identify, $email));
        return redirect("/{$identify}/login");
    }
}
