<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionArticle
 *
 * @property int $id
 * @property string $title
 * @property string $brief
 * @property string $ref
 * @property string $cover
 * @property int $type
 * @property string $content
 * @property bool $status
 * @property int $priority
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property string $small_cover
 * @property string $tiny_cover
 * @property string $middle_cover
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereBrief($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereMiddleCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereSmallCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereTinyCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticle whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class EzOptionArticle extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_article';

	protected $casts = [
		'type' => 'int',
		'status' => 'bool',
		'priority' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'title',
		'brief',
		'ref',
		'cover',
		'type',
		'content',
		'status',
		'priority',
		'updated_by',
		'small_cover',
		'tiny_cover',
		'middle_cover'
	];
}
