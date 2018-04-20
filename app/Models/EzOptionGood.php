<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionGood
 *
 * @property int $goods_id
 * @property bool $goods_nature
 * @property int $status
 * @property string $share_symbol
 * @property int $exercise_cycle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $approved_at
 * @property \Carbon\Carbon $exercise_end_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereExerciseCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereExerciseEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereGoodsNature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionGood whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EzOptionGood extends Eloquent
{
    protected $connection = 'e7_security';

	protected $primaryKey = 'goods_id';

	protected $casts = [
		'goods_nature' => 'bool',
		'status' => 'int',
		'exercise_cycle' => 'int'
	];

	protected $dates = [
		'approved_at',
		'exercise_end_at'
	];

	protected $fillable = [
		'goods_nature',
		'status',
		'share_symbol',
		'exercise_cycle',
		'approved_at',
		'exercise_end_at'
	];
}
