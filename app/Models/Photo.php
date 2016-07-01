<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
 */
class Photo extends Model
{
    //public $table = 'photos';
    protected $table = 'user_images';
    //protected $table = 'product_images';

    protected $fillable = ['path'];

    public $timestamps = false;

    public function slider()
    {
        return $this->morphTo('Fully\Models\Slider', 'relationship');
    }

    public function photo_gallery()
    {
        return $this->morphTo('Fully\Models\PhotoGallery', 'relationship');
    }




    public function product()
    {
        return $this->belongsTo(\Fully\Models\Product::class);
    }
}
