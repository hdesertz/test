<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionShareExtension
 *
 * @property int $id
 * @property string $share_code
 * @property int $classify
 * @property string $concept
 * @property float $chg2
 * @property float $chg4
 * @property float $prem_rate1
 * @property float $prem_rate
 * @property \Carbon\Carbon $updated_at
 * @property int $nmc
 * @property string $share_name
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereChg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereChg4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereClassify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereConcept($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereNmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension wherePremRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension wherePremRate1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereShareName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionShareExtension whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EzOptionShareExtension extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_share_extension';
	public $timestamps = false;

	protected $casts = [
		'classify' => 'int',
		'chg2' => 'float',
		'chg4' => 'float',
		'prem_rate1' => 'float',
		'prem_rate' => 'float',
		'nmc' => 'int'
	];

	protected $fillable = [
		'share_code',
		'classify',
		'concept',
		'chg2',
		'chg4',
		'prem_rate1',
		'prem_rate',
		'nmc',
		'share_name'
	];
}
