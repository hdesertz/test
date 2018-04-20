<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionShareHistory
 *
 * @property int $id
 * @property string $share_symbol
 * @property float $chg
 * @property float $close_price
 * @property \Carbon\Carbon $trade_day
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareHistory whereChg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareHistory whereClosePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareHistory whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareHistory whereTradeDay($value)
 * @mixin \Eloquent
 */
class EzOptionShareHistory extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_share_history';
	public $timestamps = false;

	protected $casts = [
		'chg' => 'float',
		'close_price' => 'float'
	];

	protected $dates = [
		'trade_day'
	];

	protected $fillable = [
		'share_symbol',
		'chg',
		'close_price',
		'trade_day'
	];
}
