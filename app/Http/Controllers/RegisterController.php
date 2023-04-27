<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request,UserService $userService)
    {
        $user = User::create([
            $userService->fieldName() => $request->account,
            'password' => Hash::make($request->password),
        ]);
        //注册成功之后返回用户数据与token
        return [
            'user' =>$user,
            'token' => $user->createToken('auth')->plainTextToken
        ];
    }
}
