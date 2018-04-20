<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionEscrowBalance
 *
 * @property int $id
 * @property string $name
 * @property float $balance
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionEscrowBalance whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionEscrowBalance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionEscrowBalance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionEscrowBalance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionEscrowBalance whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EzOptionEscrowBalance extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_escrow_balance';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'balance' => 'float'
	];

	protected $fillable = [
		'name',
		'balance'
	];
}
