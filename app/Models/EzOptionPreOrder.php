<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionPreOrder
 *
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property string $order_sn
 * @property int $pre_quantity
 * @property string $share_symbol
 * @property int $goods_nature
 * @property int $exercise_cycle
 * @property int $dlvr_by
 * @property \Carbon\Carbon $dlvr_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $finished_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereDlvrAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereDlvrBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereExerciseCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereGoodsNature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder wherePreQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPreOrder whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionPreOrder extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_pre_order';

	protected $casts = [
		'user_id' => 'int',
		'status' => 'int',
		'pre_quantity' => 'int',
		'goods_nature' => 'int',
		'exercise_cycle' => 'int',
		'dlvr_by' => 'int'
	];

	protected $dates = [
		'dlvr_at',
		'finished_at'
	];

	protected $fillable = [
		'user_id',
		'status',
		'order_sn',
		'pre_quantity',
		'share_symbol',
		'goods_nature',
		'exercise_cycle',
		'dlvr_by',
		'dlvr_at',
		'finished_at'
	];
}
