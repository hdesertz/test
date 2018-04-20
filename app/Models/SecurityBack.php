<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:12:23 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SecurityBack
 *
 * @property int $id
 * @property int $admin_id
 * @property int $ip
 * @property \Carbon\Carbon $login_time
 * @property string $password
 * @property int $login_count
 * @property string $platform
 * @property string $city
 * @property int $refer
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereLoginCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityBack whereRefer($value)
 * @mixin \Eloquent
 */
class SecurityBack extends Eloquent
{
	protected $table = 'security_back';
	public $timestamps = false;

	protected $casts = [
		'admin_id' => 'int',
		'ip' => 'int',
		'login_count' => 'int',
		'refer' => 'int'
	];

	protected $dates = [
		'login_time'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'admin_id',
		'ip',
		'login_time',
		'password',
		'login_count',
		'platform',
		'city',
		'refer'
	];
}
