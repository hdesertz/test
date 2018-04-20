<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionCardBin
 *
 * @property int $bin
 * @property int $card_type
 * @property string $bank_id
 * @property string $bank_abbreviation
 * @property string $bank_name
 * @property string $bank_phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $qt_bank_code
 * @property string $ff_bank_code
 * @property string $gfb_bank_code
 * @property string $card_name
 * @property string $card_type_desc
 * @property string $origin_bank_id
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereBankAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereBankPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereBin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereCardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereCardType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereCardTypeDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereFfBankCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereGfbBankCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereOriginBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereQtBankCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionCardBin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EzOptionCardBin extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_card_bin';
	protected $primaryKey = 'bin';
	public $incrementing = false;

	protected $casts = [
		'bin' => 'int',
		'card_type' => 'int'
	];

	protected $fillable = [
		'card_type',
		'bank_id',
		'bank_abbreviation',
		'bank_name',
		'bank_phone',
		'qt_bank_code',
		'ff_bank_code',
		'gfb_bank_code',
		'card_name',
		'card_type_desc',
		'origin_bank_id'
	];
}
