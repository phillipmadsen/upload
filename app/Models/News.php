<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Fully\Interfaces\ModelInterface as ModelInterface;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


/**
 * Class News.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class News extends BaseModel implements ModelInterface, SluggableInterface, HasMediaConversions
{
    use HasMediaTrait;

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 368, 'h' => 232])
             ->performOnCollections('images');
    }

    // $newsItem = News::find(1);
	// $newsItem->addMedia($pathToFile)->toCollection('images');

    use SluggableTrait;

    public $table = 'news';
    public $fillable = ['title', 'content', 'datetime', 'is_published'];
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return getLang().'/news/'.$this->attributes['slug'];
    }


}
