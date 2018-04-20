<?php
/**
 * Created by PhpStorm.
 * User:  liuxiaolong
 * Brief: 日志处理类
 * Date:  2017/6/4
 * Time:  下午5:39
 */

namespace App\Lib\Util;


class LogHelper {

    //异常日志名称
    const LOG_EXCEPTION = 'exception_log';

    /**
     * @var mixed
     */
    protected $writer;

    /**
     * Constructor
     */
    public function __construct() {
        $this->writer = new LogWriter();
    }

    /**
     * 获取日志写入类
     * @return mixed
     */
    public function get_writer() {
        return $this->writer;
    }


    /**
     * 记录日志
     * @param  string|null      $file_name
     * @param  mixed       $object
     * @param  boolean     $add_time
     * @return bool What the Logger returns
     */
    public function log($file_name, $object, $add_time = TRUE) {
        if( is_null($file_name) ) {
            return TRUE;
        }
        $message = $this->format($object);
        ini_set('date.timezone', 'Asia/Shanghai');
        date_default_timezone_set('Asia/Shanghai');
        $current_time = date("Y-m-d H:i:s", time());
        if( $add_time ) {
            $message = "[$current_time]\t" . $message;
        }
        $this->writer->write($file_name, $message);
        return TRUE;
    }


    /**
     * 格式化日志消息
     * @param  mixed     $object               The log message
     * @return string    The processed string
     */
    protected function format($object) {
        if ($object instanceof \Closure) {
            return Utilities::get_closure($object);
        }
        switch (gettype($object)) {
            case 'array':
            case 'object':
                $ret = print_r($object, true);
                break;
            default:
                $ret = (string)$object;
        }
        return $ret;
    }
    
}