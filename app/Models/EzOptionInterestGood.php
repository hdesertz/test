<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionInterestGood
 *
 * @property int $id
 * @property int $user_id
 * @property int $goods_id
 * @property string $share_symbol
 * @property int $exercise_cycle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereExerciseCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionInterestGood whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionInterestGood extends Eloquent
{
    protected $connection = 'e7_security';

	protected $casts = [
		'user_id' => 'int',
		'goods_id' => 'int',
		'exercise_cycle' => 'int'
	];

	protected $fillable = [
		'user_id',
		'goods_id',
		'share_symbol',
		'exercise_cycle'
	];
}
