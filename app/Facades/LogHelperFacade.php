<?php
/**
 * Created by PhpStorm.
 * User:  liuxiaolong
 * Brief: 日志Facades
 * Date:  2017/6/4
 * Time:  下午5:39
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LogHelperFacade extends Facade {

    protected static function getFacadeAccessor() { return '\App\Lib\Util\LogHelper'; }

}