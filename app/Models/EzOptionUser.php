<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionUser
 *
 * @property int $user_id
 * @property int $user_type
 * @property int $master_id
 * @property string $salesperson_id
 * @property int $source
 * @property int $status
 * @property string $mobile
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $id_no
 * @property string $nick_name
 * @property \Carbon\Carbon $binded_at
 * @property string $mask_name
 * @property int $platform
 * @property int $blacklist_user
 * @property int $can_charge
 * @property int $can_withdraw
 * @property string $reg_ip
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereBindedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereBlacklistUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereCanCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereCanWithdraw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereIdNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereMaskName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereMasterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereRegIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereSalespersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUser whereUserType($value)
 * @mixin \Eloquent
 */
class EzOptionUser extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_user';
	protected $primaryKey = 'user_id';

	protected $casts = [
		'user_type' => 'int',
		'master_id' => 'int',
		'source' => 'int',
		'status' => 'int',
		'platform' => 'int',
		'blacklist_user' => 'int',
		'can_charge' => 'int',
		'can_withdraw' => 'int'
	];

	protected $dates = [
		'binded_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_type',
		'master_id',
		'salesperson_id',
		'source',
		'status',
		'mobile',
		'name',
		'email',
		'password',
		'avatar',
		'id_no',
		'nick_name',
		'binded_at',
		'mask_name',
		'platform',
		'blacklist_user',
		'can_charge',
		'can_withdraw',
		'reg_ip'
	];
}
