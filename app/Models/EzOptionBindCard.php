<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionBindCard
 *
 * @property int $id
 * @property int $user_id
 * @property string $card_no
 * @property int $bin
 * @property int $usage
 * @property string $bind_mobile
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $fail_desc
 * @property string $account_province
 * @property string $account_city
 * @property string $account_network
 * @property string $line_number
 * @property string $gfb_contract_no
 * @property string $jp_contract_no
 * @property string $sxf_contract_no
 * @property string $ysb_token
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereAccountCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereAccountNetwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereAccountProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereBin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereBindMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereCardNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereFailDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereGfbContractNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereJpContractNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereLineNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereSxfContractNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionBindCard whereYsbToken($value)
 * @mixin \Eloquent
 */
class EzOptionBindCard extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_bind_card';

	protected $casts = [
		'user_id' => 'int',
		'bin' => 'int',
		'usage' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'ysb_token'
	];

	protected $fillable = [
		'user_id',
		'card_no',
		'bin',
		'usage',
		'bind_mobile',
		'status',
		'fail_desc',
		'account_province',
		'account_city',
		'account_network',
		'line_number',
		'gfb_contract_no',
		'jp_contract_no',
		'sxf_contract_no',
		'ysb_token'
	];
}
