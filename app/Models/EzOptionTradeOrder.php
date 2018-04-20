<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionTradeOrder
 *
 * @property int $id
 * @property int $user_id
 * @property int $salesperson_id
 * @property string $order_id
 * @property string $pre_order_id
 * @property string $share_symbol
 * @property string $goods_name
 * @property float $goods_price
 * @property bool $goods_nature
 * @property float $std_goods_price
 * @property int $exercise_cycle
 * @property float $exercise_price
 * @property int $quantity
 * @property float $settle_amount
 * @property float $settle_price
 * @property int $status
 * @property int $special_status
 * @property float $pay_amount
 * @property float $std_pay_amount
 * @property int $approved_by
 * @property \Carbon\Carbon $approved_at
 * @property \Carbon\Carbon $pay_at
 * @property \Carbon\Carbon $exercise_at
 * @property \Carbon\Carbon $settlement_at
 * @property int $settlement_by
 * @property \Carbon\Carbon $exercise_start_at
 * @property \Carbon\Carbon $exercise_end_at
 * @property int $exercise_start_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $ranking
 * @property string $pre_order_sn
 * @property string $related_pay_order
 * @property int $channel
 * @property int $refund_type
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereExerciseAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereExerciseCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereExerciseEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereExercisePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereExerciseStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereExerciseStartBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereGoodsNature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder wherePayAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder wherePayAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder wherePreOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder wherePreOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereRefundType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereRelatedPayOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereSalespersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereSettleAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereSettlePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereSettlementAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereSettlementBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereSpecialStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereStdGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereStdPayAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeOrder whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionTradeOrder extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_trade_order';

	protected $casts = [
		'user_id' => 'int',
		'salesperson_id' => 'int',
		'goods_price' => 'float',
		'goods_nature' => 'bool',
		'std_goods_price' => 'float',
		'exercise_cycle' => 'int',
		'exercise_price' => 'float',
		'quantity' => 'int',
		'settle_amount' => 'float',
		'settle_price' => 'float',
		'status' => 'int',
		'special_status' => 'int',
		'pay_amount' => 'float',
		'std_pay_amount' => 'float',
		'approved_by' => 'int',
		'settlement_by' => 'int',
		'exercise_start_by' => 'int',
		'ranking' => 'int',
		'channel' => 'int',
		'refund_type' => 'int'
	];

	protected $dates = [
		'approved_at',
		'pay_at',
		'exercise_at',
		'settlement_at',
		'exercise_start_at',
		'exercise_end_at'
	];

	protected $fillable = [
		'user_id',
		'salesperson_id',
		'order_id',
		'pre_order_id',
		'share_symbol',
		'goods_name',
		'goods_price',
		'goods_nature',
		'std_goods_price',
		'exercise_cycle',
		'exercise_price',
		'quantity',
		'settle_amount',
		'settle_price',
		'status',
		'special_status',
		'pay_amount',
		'std_pay_amount',
		'approved_by',
		'approved_at',
		'pay_at',
		'exercise_at',
		'settlement_at',
		'settlement_by',
		'exercise_start_at',
		'exercise_end_at',
		'exercise_start_by',
		'ranking',
		'pre_order_sn',
		'related_pay_order',
		'channel',
		'refund_type'
	];
}
