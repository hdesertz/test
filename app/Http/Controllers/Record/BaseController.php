<?php

namespace App\Http\Controllers\Record;

use App\Helpers\{ErrorCode,PopCode};
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * @SWG\Info(title="My API", version="0.1")
     */
    public static function sendResponse($data = '', $popCode = 1, $popType = 1)
    {
        $return = array();
        $return['code'] = strval(1);
        $return['msg'] = ErrorCode::getErrorCodeMsg(1);
        $return['pop_type'] = strval($popType);
        $return['pop_msg'] = PopCode::gePopCodeMsg($popCode);
        if ($data) {
            $return['data'] = $data;
        } else {
            $return['data'] = [];
        };
        return response($return);
    }

    public static function sendError($code, $popType = 1, $pop_msg = '')
    {
        $return = array();
        $msg = ErrorCode::getErrorCodeMsg($code);
        $return['code'] = strval($code);
        $return['msg'] = $msg;
        $return['pop_type'] = strval($popType);
        $return['pop_msg'] = PopCode::gePopCodeMsg($code);
        if ($pop_msg != '') {
            $return['pop_msg'] = $pop_msg;
        }
        return response($return);
    }
}
