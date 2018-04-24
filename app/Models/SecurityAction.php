<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Apr 2018 18:11:30 +0800.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SecurityAction
 *
 * @property int $id
 * @property int $address
 * @property int $user_id
 * @property int $last_ip
 * @property int $ip
 * @property string $password
 * @property int $login_count
 * @property int $pass_is_true
 * @property string $platform
 * @property string $last_city
 * @property string $city
 * @property int $refer
 * @property string $created_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereLastCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereLoginCount($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction wherePassIsTrue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereRefer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SecurityAction whereCreatedAt($value)
 * @mixin \Eloquent
 */
class SecurityAction extends Eloquent
{
	protected $table = 'security_action';
	public $timestamps = false;

	const PASS_FALSE = 2;
    const PASS_TRUE = 1;

	protected $casts = [
		'address' => 'int',
		'user_id' => 'int',
		'last_ip' => 'int',
		'ip' => 'int',
		'login_count' => 'int',
		'pass_is_true' => 'int',
		'refer' => 'string'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'address',
		'user_id',
		'last_ip',
		'ip',
		'password',
		'login_count',
		'pass_is_true',
		'platform',
		'last_city',
		'city',
		'refer',
        'created_at',
	];
}
