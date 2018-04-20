<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionRolePercentage
 *
 * @property int $id
 * @property int $role_id
 * @property float $percentage
 * @property string $percentage_detail
 * @property int $ref_role_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $updated_by
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage wherePercentageDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage whereRefRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionRolePercentage whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class EzOptionRolePercentage extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_role_percentage';

	protected $casts = [
		'role_id' => 'int',
		'percentage' => 'float',
		'ref_role_id' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'role_id',
		'percentage',
		'percentage_detail',
		'ref_role_id',
		'updated_by'
	];
}
