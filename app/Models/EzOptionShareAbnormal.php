<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionShareAbnormal
 *
 * @property int $id
 * @property int $type
 * @property string $reason
 * @property string $share_name
 * @property string $share_code
 * @property \Carbon\Carbon $trade_day
 * @property int $status
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereShareName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereTradeDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareAbnormal whereType($value)
 * @mixin \Eloquent
 */
class EzOptionShareAbnormal extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_share_abnormal';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'trade_day'
	];

	protected $fillable = [
		'type',
		'reason',
		'share_name',
		'share_code',
		'trade_day',
		'status'
	];
}
