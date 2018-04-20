<?php

namespace App\Helpers;

class HttpRequest {
	/**
	 * curl 执行信息
	 */
	private static $curl_info;

	/**
	 * curl 错误信息
	 */
	private static $curl_error;

	/**
	 * 连接超时时间
	 */
	private static $connect_timeout = 1;

	/**
	 * 总执行时间
	 */
	private static $curl_timeout = 2;

	/**
	 * http post请求
	 * @param   string  url     请求的url
	 * @param   array   params  请求的参数，数组
	 * @param   int     port    端口
	 * @return  string  result  请求结果，失败返回false
	 */
	public static function post($url, $params = array(), $port = 80) {
		if (!$url) {
			return false;
		}
		if (!function_exists('curl_init')) {
			return false;
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_PORT, $port);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connect_timeout);
		curl_setopt($ch, CURLOPT_TIMEOUT, self::$curl_timeout);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// 对认证证书来源的检查，0表示阻止对证书的合法性的检查。
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// 从证书中检查SSL加密算法是否存在
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_POST, true);
        if(isset($params['headers'])){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
            unset($params['headers']);
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		if (!$result) {
			$errmsg = curl_error($ch);
			self::setError($errmsg);
		}
		self::setInfo(curl_getinfo($ch));
		curl_close($ch);
		return $result;
	}

	/**
	 * http get请求
	 * @param   string  url     请求的url
	 * @param   int     port    端口
	 * @return  string  result  请求结果，失败返回false
	 */
	public static function get($url, $header='', $port = 80) {
		if (!$url) {
			return false;
		}
		if (!function_exists('curl_init')) {
			return false;
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
        if($header != ''){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_ENCODING,"gzip");
        }
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connect_timeout);
		curl_setopt($ch, CURLOPT_TIMEOUT, self::$curl_timeout);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// 对认证证书来源的检查，0表示阻止对证书的合法性的检查。
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// 从证书中检查SSL加密算法是否存在
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
        //\Log::info('curl_header'.print_r($header,true));
        //\Log::info('curl_url'.print_r($url,true));
        //\Log::info('curl_result'.print_r($result,true));

		if (!$result) {
			$errmsg = curl_error($ch);
			self::setError($errmsg);
		}
		self::setInfo(curl_getinfo($ch));
		curl_close($ch);
		return $result;
	}

	/**
	 *
	 */
	private static function setInfo($info) {
		self::$curl_info = $info;
	}

	/**
	 *
	 */
	public static function getInfo() {
		return self::$curl_info;
	}

	/**
	 *
	 */
	private static function setError($error) {
		self::$curl_error = $error;
	}

	/**
	 *
	 */
	public static function getError() {
		return self::$curl_error;
	}

	/**
	 * 设置超时时间
	 */
	public static function setTimeout($connect_timeout, $curl_timeout) {
		self::$connect_timeout = $connect_timeout;
		self::$curl_timeout = $curl_timeout;
	}

}