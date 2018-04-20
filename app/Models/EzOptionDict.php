<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionDict
 *
 * @property int $id
 * @property int $type
 * @property string $type_name
 * @property int $key
 * @property string $value
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionDict whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionDict whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionDict whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionDict whereTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionDict whereValue($value)
 * @mixin \Eloquent
 */
class EzOptionDict extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_dict';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'key' => 'int'
	];

	protected $fillable = [
		'type',
		'type_name',
		'key',
		'value'
	];
}
