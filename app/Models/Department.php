<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Department
 *
 * @property int $id
 * @property string $dep_id
 * @property string $p_dep_id
 * @property string $name
 * @property int $level
 * @property string $code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $updated_by
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereDepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department wherePDepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Department extends Eloquent
{
    protected $connection = 'e7_security';
	protected $table = 'department';

	protected $casts = [
		'level' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'dep_id',
		'p_dep_id',
		'name',
		'level',
		'code',
		'updated_by'
	];
}
