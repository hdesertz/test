<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:12:20 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SecurityFront
 *
 * @property int $id
 * @property int $user_id
 * @property int $ip
 * @property \Carbon\Carbon $login_time
 * @property string $password
 * @property int $login_count
 * @property string $platform
 * @property string $city
 * @property int $refer
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereLoginCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereRefer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityFront whereUserId($value)
 * @mixin \Eloquent
 */
class SecurityFront extends Eloquent
{
	protected $table = 'security_front';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
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
		'user_id',
		'ip',
		'login_time',
		'password',
		'login_count',
		'platform',
		'city',
		'refer'
	];
}
