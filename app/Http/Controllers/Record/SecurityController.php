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

class SecurityController extends BaseController
{

    private $request;
    private $ip;
    private $url;
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
        $this->url = $request->getUri();
        $this->ip = $request->getClientIp();
        $this->ip == '127.0.0.1' && $this->ip = '101.81.124.182';  //临时测试
        $this->request = $request->input();
        $input = $this->request;
        LogHelper::log('login',$input);

        if (!isset($input['user_id']) || !isset($input['address'])) {
            return $this->sendError(10001);
        }
        if (!isset(self::$address[$input['address']])) {
            return $this->sendError(10002);
        }

    }
    /**
     * prams str ip
     * prams str address (1前台2后台)
     * prams str user_id (前台是用户id或者手机号 后台为工号或者手机号)
     * prams str password
     * prams str pass_is_true
     * prams str platform（哪一个网站）
     * prams str refer
     * return mixd
     * @auth hezhi
     * date 2018/4/20 上午10:51
     */
    //统一入口
    public function record()
    {
        $input = $this->request;
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
        $sec_fro->password = md5($input['password'] ?? '');
        $sec_fro->login_count ++;
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
            $this->isNormal($sec_fro,$city,$user_id);
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
            $sec_bac->admin_id= $admin_id;
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
        $sec_bac->password = md5($input['password'] ?? '');
        $sec_bac->login_count ++;
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
            $this->isNormal($sec_bac,$city,$admin_id);
        }
    }


    private function isNormal($sec, $city,$user_id)
    {
        $input = $this->request;

        //异地登录
        if ($this->last_city != $city) {
            //回调通知
            \Queue::push(new EzSeCallback(EzSeCallback::REMOTE_LOGIN,$user_id),'','security');
        }
        //密码过于简单
        if (preg_match("/^[0-9]*$/", $input['password'])) {
            //回调通知
            \Queue::push(new EzSeCallback(EzSeCallback::EAZY_PASS,$user_id),'','security');
        }
        //密码连续错误次数
        $count = SecurityAction::whereAddress($input['address'])->whereUserId($user_id)->where('created_at', '>=', date('Y-m-d H:i:s', time() - 3600))->where('created_at', '<=', date('Y-m-d H:i:s'))->wherePassIsTrue(SecurityAction::PASS_FALSE)->count();
        if ($count > env('MAX_ERROR_COUNTS', 3)) {
            //回调通知
            \Queue::push(new EzSeCallback(EzSeCallback::MANY_TIMES,$user_id),'','security');
        };

    }


    private function queryCityFromIp($ip)
    {
        $param = [];
        $param['ip'] = $ip;
        $param['ak'] = self::BD_AK;
        $url_param = http_build_query($param);
        $url = self::BD_IP.$url_param;
        $ret = HttpRequest::get($url);
        \Log::info('百度iP'.$ret);
        $ret = json_decode($ret);
        if(isset($ret->status) && $ret->status == 0) return $ret->content->address_detail->city;
        return '未知';


    }

}