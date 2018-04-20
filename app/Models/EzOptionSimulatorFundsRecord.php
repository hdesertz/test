<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionSimulatorFundsRecord
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
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereChargeEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereEscrowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereEscrowProcedureFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereExtraInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereEzOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereIsCleared($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereProcedureFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereRandomFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereReconciliation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereRelatedEzOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereSelectCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereSettleAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereSettleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereSpecialTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionSimulatorFundsRecord whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionSimulatorFundsRecord extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_simulator_funds_record';

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
		'settle_amount' => 'float'
	];

	protected $dates = [
		'approved_at',
		'charge_end_at'
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
		'settle_amount'
	];
}
