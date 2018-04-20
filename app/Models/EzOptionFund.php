<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionFund
 *
 * @property int $account_id
 * @property int $user_id
 * @property float $balance
 * @property float $freeze_amount
 * @property int $status
 * @property string $sign
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property float $debt
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereDebt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereFreezeAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionFund whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionFund extends Eloquent
{
    protected $connection = 'e7_security';

	protected $primaryKey = 'account_id';
	public $incrementing = false;

	protected $casts = [
		'account_id' => 'int',
		'user_id' => 'int',
		'balance' => 'float',
		'freeze_amount' => 'float',
		'status' => 'int',
		'debt' => 'float'
	];

	protected $fillable = [
		'user_id',
		'balance',
		'freeze_amount',
		'status',
		'sign',
		'debt'
	];
}
