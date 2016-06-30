<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;


class Visits extends Model
{
	protected $table = 'visits';

	public function article()
	{
		return $this->belongsTo(\Fully\Models\Article::class, 'article_id');
	}

	public function category()
	{
		return $this->hasManyThrough(\Fully\Models\Category::class, \Fully\Models\Article::class, 'category_id', 'article_id');
	}
}
