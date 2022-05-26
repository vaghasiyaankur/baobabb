<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'abbr',
		'locale',
		'name',
		'native',
		'flag',
		'app_name',
		'script',
		'direction',
		'russian_pluralization',
		'date_format',
		'datetime_format',
		'active',
		'default',
		'parent_id',
		'lft',
		'rgt',
		'depth',
		'created_at',
		'updated_at',
    ];
}
