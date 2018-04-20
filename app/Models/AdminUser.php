<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdminUser
 *
 * @property int $id
 * @property string $admin_id
 * @property int $ref_id
 * @property int $dep_id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $admin_status
 * @property \Carbon\Carbon $password_modify_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereAdminStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereDepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser wherePasswordModifyAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminUser extends Eloquent
{
    protected $connection = 'e7_security';
	protected $casts = [
		'ref_id' => 'int',
		'dep_id' => 'int',
		'role_id' => 'int',
		'admin_status' => 'bool'
	];

	protected $dates = [
		'password_modify_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'admin_id',
		'ref_id',
		'dep_id',
		'role_id',
		'name',
		'email',
		'mobile',
		'password',
		'remember_token',
		'admin_status',
		'password_modify_at'
	];
}
