<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use HasFactory, Sluggable;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	// protected $primaryKey = 'id';
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
	// public $timestamps = false;
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'parent_id',
		'type',
		'name',
		'slug',
		'picture',
		'title',
		'content',
		'external_link',
		'name_color',
		'title_color',
		'target_blank',
		'seo_title',
		'seo_description',
		'seo_keywords',
		'excluded_from_footer',
		'active',
		'lft',
		'rgt',
		'depth',
	];
	public $translatable = ['name', 'title', 'content', 'seo_title', 'seo_description', 'seo_keywords'];
	
	/**
	 * The attributes that should be hidden for arrays
	 *
	 * @var array
	 */
	// protected $hidden = [];
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at'];
	
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => ['slug', 'name'],
			],
		];
	}
}
