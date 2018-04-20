<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionFundsRecord
 *
 * @property int $id
 * @property string $ez_order
 * @property string $escrow_id
 * @property int $user_id
 * @property int $account_id
 * @property int $approved_by
 * @property \Carbon\Carbon $approved_at
 * @property int $type
 * @property float $amount
 * @property int $channel
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $settle_date
 * @property int $reconciliation
 * @property string $extra_info
 * @property float $procedure_fee
 * @property \Carbon\Carbon $charge_end_at
 * @property int $select_card_id
 * @property int $platform
 * @property string $related_ez_order
 * @property int $special_tag
 * @property float $escrow_procedure_fee
 * @property string $random_factor
 * @property string $bank_name
 * @property int $is_cleared
 * @property float $settle_amount
 * @property \Carbon\Carbon $exercise_start_at_copy
 * @property int $refund_type
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereChargeEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereEscrowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereEscrowProcedureFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereExerciseStartAtCopy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereExtraInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereEzOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereIsCleared($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereProcedureFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereRandomFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereReconciliation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereRefundType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereRelatedEzOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereSelectCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereSettleAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereSettleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereSpecialTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFundsRecord whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionFundsRecord extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_funds_record';

	protected $casts = [
		'user_id' => 'int',
		'account_id' => 'int',
		'approved_by' => 'int',
		'type' => 'int',
		'amount' => 'float',
		'channel' => 'int',
		'status' => 'int',
		'reconciliation' => 'int',
		'procedure_fee' => 'float',
		'select_card_id' => 'int',
		'platform' => 'int',
		'special_tag' => 'int',
		'escrow_procedure_fee' => 'float',
		'is_cleared' => 'int',
		'settle_amount' => 'float',
		'refund_type' => 'int'
	];

	protected $dates = [
		'approved_at',
		'charge_end_at',
		'exercise_start_at_copy'
	];

	protected $fillable = [
		'ez_order',
		'escrow_id',
		'user_id',
		'account_id',
		'approved_by',
		'approved_at',
		'type',
		'amount',
		'channel',
		'status',
		'settle_date',
		'reconciliation',
		'extra_info',
		'procedure_fee',
		'charge_end_at',
		'select_card_id',
		'platform',
		'related_ez_order',
		'special_tag',
		'escrow_procedure_fee',
		'random_factor',
		'bank_name',
		'is_cleared',
		'settle_amount',
		'exercise_start_at_copy',
		'refund_type'
	];
}
