<?php
/**
 * Created by PhpStorm.
 * User:  liuxiaolong
 * Brief: 日志provider
 * Date:  2017/6/4
 * Time:  下午5:39
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LogHelperServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->singleton(\App\Lib\Util\LogHelper::class, \App\Lib\Util\LogHelper::class);
    }
}