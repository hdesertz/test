<?php

namespace App\Helpers;

class ErrorCode {
	static public function getErrorCodeMsg($index=0){

        $codeArray = [
            0   => "error",
            1   => "ok",
            2   => "网络异常，请稍后再试",

            10001 => '参数缺失',
            10002 => '参数错误',
            10003 => '异地登录',
            10004 => '密码过于简单',
            10005 => '密码错误次数超限',

        ];

        return isset($codeArray[$index]) ? $codeArray[$index] : '未知错误';
    }

}