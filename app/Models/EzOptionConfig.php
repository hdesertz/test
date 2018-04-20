<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionConfig
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $remark
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionConfig whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionConfig whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionConfig whereValue($value)
 * @mixin \Eloquent
 */
class EzOptionConfig extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_config';
	public $timestamps = false;

	protected $fillable = [
		'key',
		'value',
		'remark'
	];
}
