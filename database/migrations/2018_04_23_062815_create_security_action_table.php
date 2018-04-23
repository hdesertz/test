<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecurityActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('security_action', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('address')->comment('(1是前台，2是后台)');
			$table->integer('user_id')->comment('用户id');
			$table->integer('last_ip')->nullable()->comment('上次登录ip');
			$table->integer('ip')->comment('当前ip');
			$table->boolean('login_count')->comment('登录次数');
			$table->boolean('pass_is_true')->comment('(1正确2错误)');
			$table->string('platform', 20)->default('')->comment('平台');
			$table->string('last_city', 20)->nullable()->default('')->comment('上次登录城市');
			$table->string('city', 20)->default('')->comment('当前城市');
			$table->string('refer', 80)->default('')->comment('refer');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('security_action');
	}

}
