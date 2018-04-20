<?php

namespace App\Jobs;

use App\Helpers\HttpRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Silber\Bouncer\Helpers;

class EzSeCallback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const REMOTE_LOGIN = 1;
    const MANY_TIMES= 2;
    const EAZY_PASS = 3;

    protected $user_id;

    protected $code;

    protected $msg = [
        self::REMOTE_LOGIN => '异地登录',
        self::MANY_TIMES => '错误次数过多',
        self::EAZY_PASS => '密码过于简单',
    ];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($code,$user_id)
    {
        if(!isset($this->msg[$code])){
            return ;
        };
        $this->code = $code;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = 'xxx';
        //进行回call
        $param['user_id'] = $this->user_id;
        $param['code'] = $this->code;
        $param['msg'] = $this->msg[$this->code];
//        HttpRequest::post($url,$param);
    }
}
