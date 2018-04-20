<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 19 Apr 2018 06:44:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EzOptionArticleCandidate
 *
 * @property int $id
 * @property string $title
 * @property string $brief
 * @property string $ref
 * @property string $cover
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $article_date
 * @property bool $status
 * @property string $small_cover
 * @property string $tiny_cover
 * @property string $middle_cover
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereArticleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereBrief($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereMiddleCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereSmallCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereTinyCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EzOptionArticleCandidate whereTitle($value)
 * @mixin \Eloquent
 */
class EzOptionArticleCandidate extends Eloquent
{
    protected $connection = 'e7_security';

	protected $table = 'ez_option_article_candidate';
	public $timestamps = false;

	protected $casts = [
		'status' => 'bool'
	];

	protected $dates = [
		'article_date'
	];

	protected $fillable = [
		'title',
		'brief',
		'ref',
		'cover',
		'content',
		'article_date',
		'status',
		'small_cover',
		'tiny_cover',
		'middle_cover'
	];
}
