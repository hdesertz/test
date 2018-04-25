<?php

namespace App\Jobs;

use App\Helpers\HttpRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use LogHelper;

class EzSeCallback implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const REMOTE_LOGIN = 1;
    const MANY_TIMES= 2;

    protected $user_id;

    protected $code;

    protected $msg = [
        self::REMOTE_LOGIN => '异地登录',
        self::MANY_TIMES => '错误次数过多',
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
        //暂时没有回调，暂时记录
        LogHelper::log('exception_login', [$this->user_id,$this->msg[$this->code]]);
    }
}
