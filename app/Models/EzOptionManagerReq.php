<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionManagerReq
 *
 * @property int $id
 * @property int $status
 * @property string $reason
 * @property int $user_id
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property string $appoint_salesperson
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereAppointSalesperson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionManagerReq whereUserId($value)
 * @mixin \Eloquent
 */
class EzOptionManagerReq extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_manager_req';

	protected $casts = [
		'status' => 'int',
		'user_id' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'status',
		'reason',
		'user_id',
		'updated_by',
		'appoint_salesperson'
	];
}
