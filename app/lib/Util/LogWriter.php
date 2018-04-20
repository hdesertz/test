<?php
/**
 * Created by PhpStorm.
 * User:  liuxiaolong
 * Brief: 日志写入类
 * Date:  2017/6/4
 * Time:  下午5:39
 */

namespace App\Lib\Util;

class LogWriter
{

    const LOG_PATH = '/home/www/log/ez_option_logs/';

    //分割模式
    const SPLIT_MODE_MONTH = 1;
    const SPLIT_MODE_DAY = 2;
    const SPLIT_MODE_HOUR = 3;


    /*
     * 获取日志路径
     */
    public function get_log_path()
    {
        if( ! empty(env('LOG_PATH')) ) {
            return env('LOG_PATH');
        }

        return self::LOG_PATH;
    }


    /*
     * 写入日志
     */
    public function write( $log_path, $log_str, $split_mode = self::SPLIT_MODE_MONTH )
    {
        if( empty($log_path) ) {
            return false;
        }

        $path_parts = pathinfo($log_path);
        if( isset($path_parts["dirname"]) ) {
            $real_log_path = $this->get_log_path();
            if( ! is_dir($real_log_path) ) {
                system("mkdir -p " . $real_log_path . ";chmod -R 777 " . $real_log_path);
            }
            if( $split_mode == self::SPLIT_MODE_MONTH ) {
                $real_log_file = $path_parts["basename"] . "." . date("Ym");
            } elseif( $split_mode == self::SPLIT_MODE_DAY ) {
                $real_log_file = $path_parts["basename"] . "." . date("Ymd");
            } else {
                $real_log_file = $path_parts["basename"] . "." . date("YmdH");
            }

            $file = $real_log_path . "/" . $real_log_file;
            @file_put_contents($file, stripcslashes($log_str) . PHP_EOL, FILE_APPEND);
        }

        return true;
    }

}