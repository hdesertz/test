<?php

namespace App\Http\Controllers\Record;

use App\Helpers\HttpRequest;
use App\Jobs\EzSeCallback;
use App\Models\AdminUser;
use App\Models\EzOptionUser;
use App\Models\SecurityAction;
use App\Models\SecurityBack;
use App\Models\SecurityFront;
use Illuminate\Http\Request;
use LogHelper;
use Illuminate\Database\Query\Expression as raw;

class SecurityController extends BaseController
{

    private $request;
    private $ip;
    private $used_city;
    private $last_ip;
    private $last_city;

    const BD_IP = 'http://api.map.baidu.com/location/ip?';
    const BD_AK = 'hxhGnKCXFZdbKggVGr9NRpRB4GhpRrRL';

    const ADD_FRONT = 1;
    const ADD_BACK = 2;

    protected static $address = [
        self::ADD_FRONT => '前台',
        self::ADD_BACK => '后台',
    ];

    public function __construct(Request $request)
    {

        //设置白名单，但不知道我们服务器的iP地址
        $ip = $request->getClientIp();
        $this->request = $request->input();
        $input = $this->request;
        $this->ip = $input['ip'];
        LogHelper::log('login', $input);

        if (!isset($input['user_id']) || !isset($input['address'])) {
            return $this->sendError(10001);
        }
        if (!isset(self::$address[$input['address']])) {
            return $this->sendError(10002);
        }
    }


    /**
     * @SWG\Post(path="/api/v1/login/record",
     *   tags={"Security"},
     *   summary="用户登录安全记录",
     *   description="",
     *   operationId="record",
     *   @SWG\Parameter(
     *     name="address",
     *     in="query",`
     *     description="1前台2后台",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Parameter(
     *     name="user_id",
     *     in="query",
     *     description="用户Id",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Parameter(
     *     name="ip",
     *     in="query",
     *     description="用户客户端IP",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Parameter(
     *     name="refer",
     *     in="query",
     *     description="客户端用户来源",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Parameter(
     *     name="platform",
     *     in="query",
     *     description="哪一个网站",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Parameter(
     *     name="pass_is_true",
     *     in="query",
     *     description="1为正确2为错误",
     *     required=true,
     *     type="string",
     *   ),
     *   @SWG\Parameter(
     *     name="password",
     *     in="query",
     *     description="暂时不用传",
     *     required=false,
     *     type="string",
     *   ),
     *   @SWG\Response(response=200,description="successful operation"),
     * )
     */
    public function record()
    {
        $input = $this->request;
        //获取常用地
        $ret = SecurityAction::whereAddress($input['address'])->
        whereUserId($input['user_id'])->
        where('city', '<>', '未知')->
        groupBy('city')->
        having('sum', '>=', env('USED_EFFECTIVE', 3))
            ->select(new raw('count(*) as sum'), 'city')->get()->toArray();
        $this->used_city = array_column($ret, 'city');

        if (self::$address[$input['address'] == self::ADD_FRONT]) {
            return $this->securityRecordFromFront();
        } else {
            return $this->securityRecordFromBack();
        }
    }

    private function securityRecordFromFront()
    {
        $input = $this->request;
        LogHelper::log('front_login.log', $input);
        $user = EzOptionUser::whereUserId($input['user_id'])->orWhere('mobile', $input['user_id'])->first();
        if (!$user) {
            return $this->sendError(10002);
        }
        $user_id = $user->user_id;
        $city = $this->queryCityFromIp($this->ip);

        $sec_fro = SecurityFront::whereUserId($user_id)->first();

        $exitst = 1;
        if (!$sec_fro) {
            $sec_fro = new SecurityFront();
            $sec_fro->user_id = $user_id;
            $sec_fro->save();
            $exitst = 0;
        }

        //记录上次状态
        $this->last_ip = $sec_fro->ip;
        $this->last_city = $sec_fro->city;

        //数据保存
        $sec_fro->user_id = $user_id;
        $sec_fro->ip = ip2long($this->ip);
        $sec_fro->city = $city;
        $sec_fro->login_time = date('Y-m-d H:i:s');
//        $sec_fro->password = md5($input['password'] ?? '');
        $sec_fro->login_count++;
        $sec_fro->platform = $input['platform'] ?? '';
        $sec_fro->refer = $input['refet'] ?? '';
        $sec_fro->save();

        $security_action = new SecurityAction();
        $security_action->address = self::ADD_FRONT;
        $security_action->user_id = $user_id;
        $security_action->last_ip = $this->last_ip;
        $security_action->ip = ip2long($this->ip);
        $security_action->login_count = $sec_fro->login_count;
        $security_action->pass_is_true = $input['pass_is_true'] ?? '';
        $security_action->platform = $input['platform'];
        $security_action->last_city = $this->last_city;
        $security_action->city = $sec_fro->city;
        $security_action->refer = $input['refer'];
        $security_action->created_at = date('Y-m-d H:i:s');
        $security_action->save();

        if ($exitst == 1) {
            //进行异常状态分析
            $this->isNormal($sec_fro, $city, $user_id);
        }

    }

    private function securityRecordFromBack()
    {
        $input = $this->request;
        LogHelper::log('back_login.log', $input);
        $user = AdminUser::whereAdminId($input['user_id'])->orwhere('mobile', $input['user_id'])->first();
        if (!$user) {
            return $this->sendError(10002);
        }

        $admin_id = $user->admin_id;
        $city = $this->queryCityFromIp($this->ip);

        $sec_bac = SecurityBack::whereAdminId($admin_id)->first();

        $exitst = 1;
        if (!$sec_bac) {
            $sec_bac = new SecurityBack();
            $sec_bac->admin_id = $admin_id;
            $sec_bac->save();
            $exitst = 0;
        }

        //记录上次状态
        $this->last_ip = $sec_bac->ip;
        $this->last_city = $sec_bac->city;

        //数据保存
        $sec_bac->admin_id = $admin_id;
        $sec_bac->ip = ip2long($this->ip);
        $sec_bac->city = $city;
        $sec_bac->login_time = date('Y-m-d H:i:s');
//        $sec_bac->password = md5($input['password'] ?? '');
        $sec_bac->login_count++;
        $sec_bac->platform = $input['platform'] ?? '';
        $sec_bac->refer = $input['refet'] ?? '';
        $sec_bac->save();

        $security_action = new SecurityAction();
        $security_action->address = self::ADD_FRONT;
        $security_action->user_id = $admin_id;
        $security_action->last_ip = $this->last_ip;
        $security_action->ip = ip2long($this->ip);
        $security_action->login_count = $sec_bac->login_count;
        $security_action->pass_is_true = $input['pass_is_true'] ?? '';
        $security_action->platform = $input['platform'];
        $security_action->last_city = $this->last_city;
        $security_action->city = $sec_bac->city;
        $security_action->refer = $input['refer'];
        $security_action->created_at = date('Y-m-d H:i:s');
        $security_action->save();

        if ($exitst == 1) {
            //进行异常状态分析
            $this->isNormal($sec_bac, $city, $admin_id);
        }
    }


    private function isNormal($sec, $city, $user_id)
    {
        $input = $this->request;

        //异地登录
        if (!in_array($city, $this->used_city)) {
            //回调通知
            \Queue::push(new EzSeCallback(EzSeCallback::REMOTE_LOGIN, $user_id), '', 'security');
        }
        //密码连续错误次数
        $count = SecurityAction::whereAddress($input['address'])->whereUserId($user_id)->where('created_at', '>=', date('Y-m-d H:i:s', time() - 3600))->where('created_at', '<=', date('Y-m-d H:i:s'))->wherePassIsTrue(SecurityAction::PASS_FALSE)->count();
        if ($count > env('MAX_ERROR_COUNTS', 3)) {
            //回调通知
            \Queue::push(new EzSeCallback(EzSeCallback::MANY_TIMES, $user_id), '', 'security');
        };

    }


    private function queryCityFromIp($ip)
    {
        $param = [];
        $param['ip'] = $ip;
        $param['ak'] = self::BD_AK;
        $url_param = http_build_query($param);
        $url = self::BD_IP . $url_param;
        $ret = HttpRequest::get($url);
//        \Log::info('百度iP'.$ret);
        $ret = json_decode($ret);
        if (isset($ret->status) && $ret->status == 0) return $ret->content->address_detail->city;
        return '未知';
    }


}