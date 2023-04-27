<?php

namespace App\Service;
use Overtrue\EasySms\EasySms;

class SmsService
{
    /**
     * 发送短信
     */
    public function send($phone, string $templataCode, array $templataParams)
    {
        $easySms = new EasySms($this->config());

        return $easySms->send($phone, [
            //短信模板
            'template' => $templataCode,
            //模板变量
            'data' => $templataParams
        ]);
    }
    /**
     * 短信服务配置项
     */
    protected function config():array
    {
        return [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,
        
            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,
        
                // 默认可用的发送网关
                'gateways' => ['aliyun'],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'aliyun' => [
                    'access_key_id' => config('hd.aliyun.access_key_id'),
                    'access_key_secret' => config('hd.aliyun.access_key_secret'),
                    'sign_name' => config('hd.aliyun.sms_sign_name'),
                ],
                //...
            ],
        ];
    }
}
