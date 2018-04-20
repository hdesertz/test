<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionUserFeedback
 *
 * @property int $id
 * @property int $user_id
 * @property int $salesperson_Id
 * @property int $type
 * @property string $content
 * @property int $status
 * @property string $extra
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $platform
 * @property string $contact_mobile
 * @property int $show
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereContactMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereSalespersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionUserFeedback whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionUserFeedback extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_user_feedback';

	protected $casts = [
		'user_id' => 'int',
		'salesperson_Id' => 'int',
		'type' => 'int',
		'status' => 'int',
		'platform' => 'int',
		'show' => 'int'
	];

	protected $fillable = [
		'user_id',
		'salesperson_Id',
		'type',
		'content',
		'status',
		'extra',
		'platform',
		'contact_mobile',
		'show'
	];
}
