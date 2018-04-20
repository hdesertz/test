<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionAliMarketCount
 *
 * @property int $id
 * @property string $desc
 * @property int $total_count
 * @property int $used_count
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionAliMarketCount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionAliMarketCount whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionAliMarketCount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionAliMarketCount whereTotalCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionAliMarketCount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionAliMarketCount whereUsedCount($value)
 * @mixin \Eloquent
 */
class EzOptionAliMarketCount extends Eloquent
{
    protected $connection = 'e7_security';
	protected $table = 'ez_option_ali_market_count';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'total_count' => 'int',
		'used_count' => 'int'
	];

	protected $fillable = [
		'id',
		'desc',
		'total_count',
		'used_count'
	];
}
