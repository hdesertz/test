<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SecurityFront;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redis;
use Mockery\Exception;


class TestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function test1()
    {
        $str1 = 'd131dd02c5e6eec4693d9a0698aff95c2fcab58712467eab4004583eb8fb7f8955ad340609f4b30283e488832571415a085125e8f7cdc99fd91dbdf280373c5bd8823e3156348f5bae6dacd436c919c6dd53e2b487da03fd02396306d248cda0e99f33420f577ee8ce54b67080a80d1ec69821bcb6a8839396f9652b6ff72a70';
        $str1 = hex2bin($str1);
        echo $str1.'<br>';;
        $str2 = 'd131dd02c5e6eec4693d9a0698aff95c2fcab50712467eab4004583eb8fb7f8955ad340609f4b30283e4888325f1415a085125e8f7cdc99fd91dbd7280373c5bd8823e3156348f5bae6dacd436c919c6dd53e23487da03fd02396306d248cda0e99f33420f577ee8ce54b67080280d1ec69821bcb6a8839396f965ab6ff72a70';
        $str2 = hex2bin($str2);
        echo $str2;
//        echo md5($str1).'<br>';
//        echo md5($str2);
    }

    public function abTest()
    {
        try{
            \DB::transaction(function () {
                if (SecurityFront::wherePassword(1)->count() != 1) {
                    throw new Exception('xxx');
                }
                SecurityFront::insert(['password' => 1,'user_id'=>2]);
            });

        } catch (Exception $e) {
            \Log::info($e->getMessage());
        };
    }

    public function abTest1(){
        try{
            \DB::transaction(function () {
                if (SecurityFront::wherePassword(1)->count() != 1) {
                    throw new Exception('xxx');
                }

                if(SecurityFront::wherePassword(1)->count() == 1){
                    SecurityFront::insert(['password'=>1,'user_id'=>2]);
                }
            });
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        };
    }

    public function abTest2(){
        try{
            \DB::transaction(function () {


                if(SecurityFront::wherePassword(1)->count() == 1){
                    SecurityFront::insert(['password'=>1,'user_id'=>2]);
                }
            });
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        };
    }
    public function abTest3(){
        $s = SecurityFront::find(1);
        $s->user_id = $s->user_id-1;
        $x = $s->save();
        return view("welcome");
        die;
        $s = SecurityFront::insert(['password' => 1,'user_id'=>2]);
        dd($s);
        die;
        $x = Redis::setnx('lock',1);
        if($x){
            SecurityFront::insert(['password' => 1,'user_id'=>2]);
        }



    }

    public function jsonpTest3(){
        echo 1;
    }


}

