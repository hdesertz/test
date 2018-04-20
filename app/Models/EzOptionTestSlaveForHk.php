<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionTestSlaveForHk
 *
 * @property int $id
 * @property string $content
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTestSlaveForHk whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionTestSlaveForHk whereId($value)
 * @mixin \Eloquent
 */
class EzOptionTestSlaveForHk extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_test_slave_for_hk';
	public $timestamps = false;

	protected $fillable = [
		'content'
	];
}
