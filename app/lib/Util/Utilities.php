<?php

/**
 * Created by PhpStorm.
 * User:  liuxiaolong
 * Brief: 工具方法集合
 * Date:  2017/6/7
 * Time:  下午11:30
 */

namespace App\Lib\Util;

use App\Models\AdminUser;

class Utilities
{

    //唯一数字场景类型：默认00，线上充值01，提现02，支付03，退单04，结算发放盈利05，优惠奖励06，订单号07，实名认证09，日志id10 短信流水号11
    const UNIQUE_DEFAULT = '00';
    const UNIQUE_CHARGE_ONLINE = '01';
    const UNIQUE_CHARGE_OFFLINE = '31';
    const UNIQUE_WITHDRAW_ONLINE = '02';
    const UNIQUE_WITHDRAW_OFFLINE = '32';
    const UNIQUE_PAY = '03';
    const UNIQUE_ROLL_BACK = '04';
    const UNIQUE_GAIN = '05';
    const UNIQUE_BENEFIT = '06';
    const UNIQUE_TRADE_ORDER = '07';
    const UNIQUE_CERTIFY = '09';
    const UNIQUE_LOG = '10';
    const UNIQUE_SMS_BIZ_ID = '11';
    const UNIQUE_BIND_CARD = '12';
    const UNIQUE_SHELL_CHARGE = '13';
    const UNIQUE_SHELL_WITHDRAW = '14';

    const UNIQUE_NUM_LENGTH = 20;

    private static $cdn_host_prefix = NULL;

    private static $static_resource = NULL;


    /*
     * cdn域名前缀
     */
    public static function cdn_host_prefix()
    {
        if( ! is_null(self::$cdn_host_prefix) ) {
            return self::$cdn_host_prefix;
        }

        self::$cdn_host_prefix = '';

        return self::$cdn_host_prefix;
    }


    /*
     * 是否需要切换使用本站资源
     */
    public static function static_resource( $resource_name )
    {
        if( is_null(self::$static_resource) ) {
            self::$static_resource = config('static_resource');
        }

        $current_user_id = \App\Repositories\SessionRepository::get_current_user_id();
        if( in_array($current_user_id, [ 5757 ]) ) {
            return self::$static_resource[$resource_name]['home'];
        }

        return self::$static_resource[$resource_name]['cdn_bootcss'];
    }


    /**
     * 获取客户端ip
     */
    public static function get_client_ip()
    {
        static $client_ip;
        if( $client_ip ) {
            return $client_ip;
        }
        if( isset($_SERVER ['HTTP_X_FORWARD_FOR']) && $_SERVER ['HTTP_X_FORWARD_FOR'] != '127.0.0.1' ) {
            $ips = explode(',', $_SERVER ['HTTP_X_FORWARD_FOR']);
            $client_ip = $ips[0];
        } elseif( isset($_SERVER ['REMOTE_ADDR']) ) {
            $client_ip = $_SERVER ['REMOTE_ADDR'];
        } else {
            $client_ip = '127.0.0.1';
        }

        $pos = strpos($client_ip, ',');
        if( $pos > 0 ) {
            $client_ip = substr($client_ip, 0, $pos);
        }

        $pos = strpos($client_ip, ':');
        if( $pos > 0 ) {
            $client_ip = substr($client_ip, 0, $pos);
        }

        return trim($client_ip);
    }


    /**
     * 获取服务器端ip
     */
    public static function get_server_ip()
    {
        static $server_ip;
        if( $server_ip ) {
            return $server_ip;
        }
        if( isset($_SERVER['SERVER_ADDR']) ) {
            $server_ip = $_SERVER['SERVER_ADDR'];
        } else {
            $server_ip = '127.0.0.1';
        }

        return $server_ip;
    }


    /**
     * 生成唯一票据，使用场景：作为登录态access_token
     * @return string
     */
    public static function generate_unique_id()
    {
        return md5(uniqid(mt_rand(), true) . $_SERVER['REQUEST_TIME'] . mt_rand());
    }


    /**
     * utf字符转换
     *
     * @param  string $str 待转换的字符串
     *
     * @return string 转换后的字符串
     */
    public static function utf8_url_decode( $str )
    {
        $str = preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str));

        return html_entity_decode($str, NULL, 'UTF-8');
    }


    /*
     * 获取closure信息，for日志写入
     */
    public static function get_closure( $fn )
    {
        $source = new \ReflectionFunction($fn);
        $class = $source->getFileName();
        $begin_line = $source->getStartLine();
        $end_line = $source->getEndline();

        return "{$class} {$begin_line} : {$end_line}";
    }


    /**
     * 生成唯一数字串，使用场景：订单号，充值单号，提现单号，用户id
     *
     * @param  string $element 混淆元素：一般使用当前登录用户id
     * @param  string $type    场景类型：充值1，提现2，订单3，实名认证4，日志id5
     *
     * @return string
     */
    public static function generate_unique_num( $element = '0', $type = self::UNIQUE_DEFAULT )
    {
        //场景类型2位 + 时间12位 + 混淆元素末尾3位，不足则在左边补$type值 + 随机3位数字
        $unique_num = $type . date('ymdHis') . str_pad(substr($element, -3), 3, $type, STR_PAD_LEFT) . rand(100, 999);

        return $unique_num;
    }


    /*
     * 图片下载
     */
    public static function download_pic( $url, $path = '', $filename = '' )
    {
        empty($path) && $path = "/Users/liuxiaolong/Documents/ezoption/public/imgs/download/";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file = curl_exec($ch);
        $curl_info = curl_getinfo($ch);
        curl_close($ch);
        if( $curl_info['http_code'] == 200 ) {
            self::save_as_image($url, $file, $path, $filename);
            unset($curl_info);

            return true;
        }

        echo "download pic fail:" . $url;

        return false;
    }


    /*
     * 保存图片
     */
    public static function save_as_image( $url, $file, $path, $filename = '' )
    {
        empty($filename) && $filename = pathinfo($url, PATHINFO_BASENAME);
        $resource = fopen($path . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
    }


    /**
     * 校验时间格式是否正确
     *
     * @param string $date   日期
     * @param string $format 需要检验的格式
     *
     * @return boolean
     */
    public static function valid_time_format( $date, $format = "Y-m-d" )
    {
        $unix_time = strtotime($date);
        //转换为unix_time是否正确
        if( ! $unix_time ) {
            return false;
        }
        //校验日期的有效性
        if( date($format, $unix_time) == $date ) {
            return true;
        }

        return false;
    }


    /*
     * GBK数据编码转换UTF-8
     */
    public static function encode_convert( $origin_data, $from_code = 'GBK', $to_code = 'UTF-8' )
    {
        if( strtoupper($to_code) == strtoupper($from_code) ) {
            return $origin_data;
        }

        if( is_string($origin_data) ) {
            if( function_exists('mb_convert_encoding') ) {
                return mb_convert_encoding($origin_data, $to_code, $from_code);
            } else {
                return iconv($from_code, $to_code, $origin_data);
            }
        } elseif( is_array($origin_data) ) {
            foreach( $origin_data as $k => $v ) {
                $origin_data[$k] = self::encode_convert($v, $from_code, $to_code);
            }

            return $origin_data;
        }

        return $origin_data;
    }


    /*
     * 获取一级域名
     */
    public static function top_domain( $domain )
    {
        $root_domains = [
            'ac',
            'ad',
            'ae',
            'aero',
            'af',
            'ag',
            'ai',
            'al',
            'am',
            'an',
            'ao',
            'aq',
            'ar',
            'arpa',
            'as',
            'asia',
            'at',
            'au',
            'aw',
            'ax',
            'az',
            'ba',
            'bb',
            'bd',
            'be',
            'bf',
            'bg',
            'bh',
            'bi',
            'biz',
            'bj',
            'bl',
            'bm',
            'bn',
            'bo',
            'bq',
            'br',
            'bs',
            'bt',
            'bv',
            'bw',
            'by',
            'bz',
            'ca',
            'cat',
            'cc',
            'cd',
            'cf',
            'cg',
            'ch',
            'ci',
            'ck',
            'cl',
            'cm',
            'cn',
            'co',
            'com',
            'coop',
            'cr',
            'cu',
            'cv',
            'cw',
            'cx',
            'cy',
            'cz',
            'de',
            'dj',
            'dk',
            'dm',
            'do',
            'dz',
            'ec',
            'edu',
            'ee',
            'eg',
            'eh',
            'er',
            'es',
            'et',
            'eu',
            'fi',
            'fj',
            'fk',
            'fm',
            'fo',
            'fr',
            'ga',
            'gb',
            'gd',
            'ge',
            'gf',
            'gg',
            'gh',
            'gi',
            'gl',
            'gm',
            'gn',
            'gov',
            'gp',
            'gq',
            'gr',
            'gs',
            'gt',
            'gu',
            'gw',
            'gy',
            'hk',
            'hm',
            'hn',
            'hr',
            'ht',
            'hu',
            'id',
            'ie',
            'il',
            'im',
            'in',
            'info',
            'int',
            'io',
            'iq',
            'ir',
            'is',
            'it',
            'je',
            'jm',
            'jo',
            'jobs',
            'jp',
            'ke',
            'kg',
            'kh',
            'ki',
            'km',
            'kn',
            'kp',
            'kr',
            'kw',
            'ky',
            'kz',
            'la',
            'lb',
            'lc',
            'li',
            'lk',
            'lr',
            'ls',
            'lt',
            'lu',
            'lv',
            'ly',
            'ma',
            'mc',
            'md',
            'me',
            'mf',
            'mg',
            'mh',
            'mil',
            'mk',
            'ml',
            'mm',
            'mn',
            'mo',
            'mobi',
            'mp',
            'mq',
            'mr',
            'ms',
            'mt',
            'mu',
            'museum',
            'mv',
            'mw',
            'mx',
            'my',
            'mz',
            'na',
            'name',
            'nc',
            'ne',
            'net',
            'nf',
            'ng',
            'ni',
            'nl',
            'no',
            'np',
            'nr',
            'nu',
            'nz',
            'om',
            'org',
            'pa',
            'pe',
            'pf',
            'pg',
            'ph',
            'pk',
            'pl',
            'pm',
            'pn',
            'pr',
            'pro',
            'ps',
            'pt',
            'pw',
            'py',
            'qa',
            're',
            'ro',
            'rs',
            'ru',
            'rw',
            'sa',
            'sb',
            'sc',
            'sd',
            'se',
            'sg',
            'sh',
            'si',
            'sj',
            'sk',
            'sl',
            'sm',
            'sn',
            'so',
            'sr',
            'ss',
            'st',
            'su',
            'sv',
            'sx',
            'sy',
            'sz',
            'tc',
            'td',
            'tel',
            'tf',
            'tg',
            'th',
            'tj',
            'tk',
            'tl',
            'tm',
            'tn',
            'to',
            'tp',
            'tr',
            'travel',
            'tt',
            'tv',
            'tw',
            'tz',
            'ua',
            'ug',
            'uk',
            'um',
            'us',
            'uy',
            'uz',
            'va',
            'vc',
            've',
            'vg',
            'vi',
            'vn',
            'vu',
            'wf',
            'ws',
            'xxx',
            'ye',
            'yt',
            'za',
            'zm',
            'zw',
        ];
        $sub_domain = explode('.', $domain);
        $top_domain = '';
        $top_domain_count = 0;
        for( $i = count($sub_domain) - 1; $i >= 0; $i-- ) {
            if( $i == 0 ) {
                // just in case of something like NAME.COM
                break;
            }
            if( in_array($sub_domain [$i], $root_domains) ) {
                $top_domain_count++;
                $top_domain = '.' . $sub_domain [$i] . $top_domain;
                if( $top_domain_count >= 2 ) {
                    break;
                }
            }
        }
        $top_domain = $sub_domain [count($sub_domain) - $top_domain_count - 1] . $top_domain;

        return $top_domain;
    }


    /*
     * 数字转中文：For 限额描述
     */
    public static function num_to_chinese( $num, $simple = true )
    {
        if( $num > 99999999 ) {
            return '无限额';
        }

        if( $simple ) {
            $c_nums = [ "零", "一", "二", "三", "四", "五", "六", "七", "八", "九" ];
            $cnyunits = [
                "元",
                "角",
                "分",
            ];
            $grees = [ "十", "百", "千", "万", "十", "百", "千", "亿" ];
        } else {
            $c_nums = [ "零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖" ];
            $cnyunits = [
                "圆",
                "角",
                "分",
            ];
            $grees = [ "拾", "佰", "仟", "万", "拾", "佰", "仟", "亿" ];
        }

        if( strpos($num, ".") ) {
            list($ns1, $ns2) = explode(".", $num, 2);
            $ns2 = array_filter([ $ns2[1], $ns2[0] ]);
            $ret = array_merge($ns2, [ implode("", self::cny_map_unit(str_split($ns1), $grees)), "" ]);
        } else {
            $ret = [ implode("", self::cny_map_unit(str_split($num), $grees)), "" ];
        }
        $ret = str_replace(array_keys($c_nums), $c_nums, $ret);

        if( $ret[0] == "一十万" ) {
            $ret[0] = "十万";
        } elseif( $ret[0] == "一十" ) {
            $ret[0] = "十";
        }

        return $ret[0];
    }


    public static function cny_map_unit( $list, $units )
    {
        $ul = count($units);
        $xs = [];
        $n = '';
        foreach( array_reverse($list) as $x ) {
            $l = count($xs);
            if( $x != "0" || ! ( $l % 4 ) ) {
                if( isset($units[( $l - 1 ) % $ul]) ) {
                    $n = ( $x == '0' ? '' : $x ) . ( $units[( $l - 1 ) % $ul] );
                }
            } else {
                $n = @is_numeric($xs[0][0]) ? $x : '';
            }
            array_unshift($xs, $n);
        }

        return $xs;
    }


    //获取当前时间
    public static function get_current_time()
    {
        list ($micro_sec, $sec) = explode(" ", microtime());

        return (float) $micro_sec + (float) $sec;
    }


    //获取main_domain
    public static function get_main_domain()
    {
        static $current_main_domain;
        if( $current_main_domain ) {
            return $current_main_domain;
        }

        if( empty($_SERVER['HTTP_HOST']) ) {
            $current_main_domain = env('MAIN_DOMAIN');
        } else {
            $current_main_domain = Utilities::top_domain($_SERVER['HTTP_HOST']);
        }

        if( $current_main_domain == "ez-option.cn" ) {
            $current_main_domain = "yiquann.com";
        }

        return $current_main_domain;
    }


    /*
     * curl-get请求
     */
    public static function curl_get( $curl_url )
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $curl_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }


    /*
     * 图片生成base64编码
     */
    public static function base64_encode_image( $image_file )
    {
        $image_data = fread(fopen($image_file, 'r'), filesize($image_file));

        return base64_encode($image_data);
    }


    /*
     * 客户经理工号
     */
    public static function get_s_id()
    {
        $s_id = 0;
        if( ! empty($_COOKIE['s_id']) && \App\Repositories\AdminUserRepository::check_admin_id($_COOKIE['s_id']) ) {
            $salesperson = AdminUser::where('admin_id', $_COOKIE['s_id'])->first();
            if( $salesperson ) {
                $s_id = $_COOKIE['s_id'];
            }
        }
        if( ! empty($_REQUEST['s_id']) && \App\Repositories\AdminUserRepository::check_admin_id($_REQUEST['s_id']) ) {
            $salesperson = AdminUser::where('admin_id', $_REQUEST['s_id'])->first();
            if( $salesperson ) {
                //发送P3P头信息，使能跨域产生cookie
                header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
                setcookie('s_id', $_REQUEST['s_id'], time() + 2592000, '/', get_main_domain());
                $s_id = $_REQUEST['s_id'];
            }
        }

        return $s_id;
    }


    /*
     * 是否危险的输入
     */
    public static function is_dangerous_input( $input )
    {
        //过滤 <script>等可能引入恶意内容或恶意改变显示布局的代码,如果不需要插入flash等,还可以加入<object>的过滤
        $preg1 = "/<(\/?)(script|i?frame|style|html|object|body|title|link|meta|\?|\%)([^>]*?)>/isU";
        $preg2 = "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU"; //过滤javascript的on事件

        return preg_match($preg1, $input) || preg_match($preg2, $input);
    }


    /*
     * 跳转去对应的url
     */
    public static function jump_to_url( $url )
    {
        echo '<html><head><meta http-equiv="Content-Language" content="zh-CN"><meta HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=utf-8"><meta http-equiv="refresh" 
content="0;url=' . $url . '"><title>jump</title></head><body><script>window.location="' . $url . '";</script></body></html>';
    }


    /*
     * 是否要转向请求
     */
    public static function need_transfer( $appoint_domain = '' )
    {
        $top_domain = Utilities::top_domain($_SERVER['HTTP_HOST']);
        if( $top_domain == $appoint_domain ) {
            return false;
        }

        return true;
    }

}