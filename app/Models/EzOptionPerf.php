<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionPerf
 *
 * @property int $id
 * @property string $month
 * @property float $amount
 * @property float $ref_amount
 * @property int $admin_id
 * @property string $detail
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereRefAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionPerf whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EzOptionPerf extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_perf';

	protected $casts = [
		'amount' => 'float',
		'ref_amount' => 'float',
		'admin_id' => 'int'
	];

	protected $fillable = [
		'month',
		'amount',
		'ref_amount',
		'admin_id',
		'detail'
	];
}
