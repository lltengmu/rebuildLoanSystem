<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Crypt;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * 统一响应格式
     */
    protected function success(string $message = "操作成功", $data = [],$code = 200)
    {
        return response()->json([
            'code'    => $code,
            'status'  => 'success',
            'message' => $message,
            'data'    => $data
        ]);
    }
    /**
     * 统一响应格式
     */
    protected function fail(string $message = "操作成功", $data = [],$code = 200)
    {
        return response()->json([
            'code'    => $code,
            'status'  => 'fail',
            'message' => $message,
            'data'    => $data
        ]);
    }
    /**
     * 解密id
     */
    protected function decryptID(string $cryptID)
    {
        preg_match_all('/\d+/',Crypt::decryptString($cryptID),$id);
        return $id[0][0];
    } 
}
