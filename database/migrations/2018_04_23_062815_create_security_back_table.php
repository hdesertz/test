<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecurityBackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('security_back', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('admin_id')->comment('工号');
			$table->integer('ip')->comment('当前ip');
			$table->dateTime('login_time')->nullable()->comment('登录时间');
			$table->string('password', 40)->default('')->comment('密码');
			$table->boolean('login_count')->comment('登录次数');
			$table->string('platform', 255)->default('')->comment('平台');
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
		Schema::drop('security_back');
	}

}
