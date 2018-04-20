<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionTradeAmount
 *
 * @property int $id
 * @property string $share_code
 * @property \Carbon\Carbon $trade_day
 * @property float $trade_amount
 * @property float $chg
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeAmount whereChg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeAmount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeAmount whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeAmount whereTradeAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTradeAmount whereTradeDay($value)
 * @mixin \Eloquent
 */
class EzOptionTradeAmount extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_trade_amount';
	public $timestamps = false;

	protected $casts = [
		'trade_amount' => 'float',
		'chg' => 'float'
	];

	protected $dates = [
		'trade_day'
	];

	protected $fillable = [
		'share_code',
		'trade_day',
		'trade_amount',
		'chg'
	];
}
