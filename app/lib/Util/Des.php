<?php
/**
 * Author: liuxiaolong
 * Brief:
 * Date:   2017/9/18
 * Time:   下午6:55
 */

namespace App\Lib\Util;

class Des
{

    var $key;

    var $iv; //偏移量


    function DES( $key, $iv = 0 )
    {
        $this->key = $key;
        if( $iv == 0 ) {
            $this->iv = $key;
        } else {
            $this->iv = $iv;
        }
    }


    //加密
    function encrypt( $str )
    {
        $size = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_CBC);
        $str = $this->pkcs5Pad($str, $size);

        $data = mcrypt_cbc(MCRYPT_DES, $this->key, $str, MCRYPT_ENCRYPT, $this->iv);

        //$data=strtoupper(bin2hex($data)); //返回大写十六进制字符串
        return base64_encode($data);
    }


    //解密
    function decrypt( $str )
    {
        $str = base64_decode($str);
        //$strBin = $this->hex2bin( strtolower($str));
        $str = mcrypt_cbc(MCRYPT_DES, $this->key, $str, MCRYPT_DECRYPT, $this->iv);
        $str = $this->pkcs5Unpad($str);

        return $str;
    }


    function hex2bin( $hexData )
    {
        $binData = "";
        for( $i = 0; $i < strlen($hexData); $i += 2 ) {
            $binData .= chr(hexdec(substr($hexData, $i, 2)));
        }

        return $binData;
    }


    function pkcs5Pad( $text, $blocksize )
    {
        $pad = $blocksize - ( strlen($text) % $blocksize );

        return $text . str_repeat(chr($pad), $pad);
    }


    function pkcs5Unpad( $text )
    {
        $pad = ord($text{strlen($text) - 1});
        if( $pad > strlen($text) ) {
            return false;
        }
        if( strspn($text, chr($pad), strlen($text) - $pad) != $pad ) {
            return false;
        }

        return substr($text, 0, -1 * $pad);
    }
}