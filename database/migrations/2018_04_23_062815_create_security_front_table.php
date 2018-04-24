<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecurityFrontTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('security_front', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->comment('用户id');
			$table->integer('ip')->nullable()->comment('当前ip');
			$table->timestamp('login_time')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('当前时间');
			$table->string('password', 40)->default('')->comment('密码');
			$table->boolean('login_count')->default(0)->comment('登录次数');
			$table->string('platform', 20)->default('')->comment('平台');
			$table->string('city', 20)->default('')->comment('当前城市');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('security_front');
	}

}
