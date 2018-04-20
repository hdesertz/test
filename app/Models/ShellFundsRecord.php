<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ShellFundsRecord
 *
 * @property int $id
 * @property string $ez_order
 * @property string $escrow_id
 * @property int $user_id
 * @property int $type
 * @property float $amount
 * @property int $channel
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $extra_info
 * @property float $procedure_fee
 * @property \Carbon\Carbon $charge_end_at
 * @property string $card_no
 * @property int $platform
 * @property int $special_tag
 * @property float $escrow_procedure_fee
 * @property string $random_factor
 * @property string $bank_name
 * @property int $account_id
 * @property int $select_card_id
 * @property string $related_ez_order
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereCardNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereChargeEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereEscrowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereEscrowProcedureFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereExtraInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereEzOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereProcedureFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereRandomFactor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereRelatedEzOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereSelectCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereSpecialTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ShellFundsRecord whereUserId($value)
 * @mixin \Eloquent
 */
class ShellFundsRecord extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'shell_funds_record';

	protected $casts = [
		'user_id' => 'int',
		'type' => 'int',
		'amount' => 'float',
		'channel' => 'int',
		'status' => 'int',
		'procedure_fee' => 'float',
		'platform' => 'int',
		'special_tag' => 'int',
		'escrow_procedure_fee' => 'float',
		'account_id' => 'int',
		'select_card_id' => 'int'
	];

	protected $dates = [
		'charge_end_at'
	];

	protected $fillable = [
		'ez_order',
		'escrow_id',
		'user_id',
		'type',
		'amount',
		'channel',
		'status',
		'extra_info',
		'procedure_fee',
		'charge_end_at',
		'card_no',
		'platform',
		'special_tag',
		'escrow_procedure_fee',
		'random_factor',
		'bank_name',
		'account_id',
		'select_card_id',
		'related_ez_order'
	];
}
