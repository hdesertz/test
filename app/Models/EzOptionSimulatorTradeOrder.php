<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionSimulatorTradeOrder
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
 * @property float $std_pay_amount
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereExerciseAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereExerciseCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereExerciseEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereExercisePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereExerciseStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereExerciseStartBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereGoodsNature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder wherePayAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder wherePayAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder wherePreOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder wherePreOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereRanking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereRelatedPayOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereSalespersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereSettleAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereSettlePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereSettlementAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereSettlementBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereSpecialStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereStdGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereStdPayAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorTradeOrder whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionSimulatorTradeOrder extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_simulator_trade_order';

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
		'approved_by' => 'int',
		'settlement_by' => 'int',
		'exercise_start_by' => 'int',
		'ranking' => 'int',
		'channel' => 'int',
		'std_pay_amount' => 'float'
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
		'std_pay_amount'
	];
}
