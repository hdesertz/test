<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Models\Phone;
use Illuminate\Console\Command;
use Excel;
use PHPUnit\Framework\MockObject\Stub\Exception;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'duyan:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $name = '王宝花';
// Mail::send()的返回值为空，所以可以其他方法进行判断
        \Mail::send('emails.test',['name'=>$name],function($message){
            $to = '2860105819@qq.com';
            $message ->to($to)->subject('邮件测试');

        });
// 返回的一个错误数组，利用此可以判断是否发送成功
        dd(\Mail::failures());



        \DB::connection('lxk_wallet')->beginTransaction();	//开启事务
        \DB::connection('mysql')->beginTransaction();	//开启事务
        try {
            $phone = new Phone();
            $phone->phone_num = 12344444;
            $a = $phone->save();

            $customer = new Customer();
            $customer->staff_id = 122;
            $b = $customer->save();
//            throw new \Exception("Value must be 1 or below");
            if($a && $b){
                \DB::connection('lxk_wallet')->commit();
                \DB::connection('mysql')->commit();

            }
        } catch(\Exception $ex) {
            \DB::connection('lxk_wallet')->rollback();	//失败，回滚事务
            \DB::connection('mysql')->rollback();
        }





        $gen = (function() {
            yield 1;
            yield 2;
            yield 3;
            return 4;
            return 3;
        })();

        foreach ($gen as $val) {
            echo $val, PHP_EOL;
        }

        echo $gen->getReturn(), PHP_EOL;
        die;
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }





}
