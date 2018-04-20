<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionShare
 *
 * @property int $id
 * @property string $share_symbol
 * @property string $share_code
 * @property string $share_pinyin
 * @property string $share_market
 * @property string $share_name
 * @property float $close_price
 * @property float $last_close_price
 * @property float $week_volatility
 * @property float $month1_volatility
 * @property float $month3_volatility
 * @property float $month6_volatility
 * @property float $history_volatility
 * @property float $year_volatility
 * @property float $chg
 * @property int $nmc
 * @property \Carbon\Carbon $trade_day
 * @property \Carbon\Carbon $listing_day
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereChg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereClosePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereHistoryVolatility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereLastClosePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereListingDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereMonth1Volatility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereMonth3Volatility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereMonth6Volatility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereNmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereShareMarket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereShareName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereSharePinyin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereShareSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereTradeDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereWeekVolatility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShare whereYearVolatility($value)
 * @mixin \Eloquent
 */
class EzOptionShare extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_share';
	public $timestamps = false;

	protected $casts = [
		'close_price' => 'float',
		'last_close_price' => 'float',
		'week_volatility' => 'float',
		'month1_volatility' => 'float',
		'month3_volatility' => 'float',
		'month6_volatility' => 'float',
		'history_volatility' => 'float',
		'year_volatility' => 'float',
		'chg' => 'float',
		'nmc' => 'int'
	];

	protected $dates = [
		'trade_day',
		'listing_day'
	];

	protected $fillable = [
		'share_symbol',
		'share_code',
		'share_pinyin',
		'share_market',
		'share_name',
		'close_price',
		'last_close_price',
		'week_volatility',
		'month1_volatility',
		'month3_volatility',
		'month6_volatility',
		'history_volatility',
		'year_volatility',
		'chg',
		'nmc',
		'trade_day',
		'listing_day'
	];
}
