<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Product",
 *      required={slug, name},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ispromo",
 *          description="ispromo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_published",
 *          description="is_published",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="availability",
 *          description="availability",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="manufacturer",
 *          description="manufacturer",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_line",
 *          description="product_line",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="office_status",
 *          description="office_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="guid",
 *          description="guid",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="asin",
 *          description="asin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="model",
 *          description="model",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sku",
 *          description="sku",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="upc",
 *          description="upc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mpn",
 *          description="mpn",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subtitle",
 *          description="subtitle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="short_description",
 *          description="short_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="category",
 *          description="category",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="meta_title",
 *          description="meta_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="meta_description",
 *          description="meta_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="facebook_title",
 *          description="facebook_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="google_plus_title",
 *          description="google_plus_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="twitter_title",
 *          description="twitter_title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="promo_price",
 *          description="promo_price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="msrp_price",
 *          description="msrp_price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="dealer_price",
 *          description="dealer_price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="employee_price",
 *          description="employee_price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sale_price",
 *          description="sale_price",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sale_price_coupon_code",
 *          description="sale_price_coupon_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sale_price_start_date",
 *          description="sale_price_start_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="sale_price_end_date",
 *          description="sale_price_end_date",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tax_id",
 *          description="tax_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tax_status",
 *          description="tax_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tax_class",
 *          description="tax_class",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="video_url",
 *          description="video_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="list_item_1",
 *          description="list_item_1",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="list_item_2",
 *          description="list_item_2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="list_item_3",
 *          description="list_item_3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="list_item_4",
 *          description="list_item_4",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="list_item_5",
 *          description="list_item_5",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="list_item_6",
 *          description="list_item_6",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="path",
 *          description="path",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="file_name",
 *          description="file_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="file_size",
 *          description="file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="image_alt",
 *          description="image_alt",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="primary_image_label",
 *          description="primary_image_label",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="primary_image_file_size",
 *          description="primary_image_file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="primary_image",
 *          description="primary_image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="second_image_label",
 *          description="second_image_label",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="second_image_file_size",
 *          description="second_image_file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="second_image",
 *          description="second_image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="third_image_label",
 *          description="third_image_label",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="third_image_file_size",
 *          description="third_image_file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="third_image",
 *          description="third_image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fourth_image_label",
 *          description="fourth_image_label",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fourth_image_file_size",
 *          description="fourth_image_file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fourth_image",
 *          description="fourth_image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fifth_image_label",
 *          description="fifth_image_label",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="fifth_image_file_size",
 *          description="fifth_image_file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fifth_image",
 *          description="fifth_image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_doc",
 *          description="product_doc",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_doc_label",
 *          description="product_doc_label",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="product_doc_file_size",
 *          description="product_doc_file_size",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tracking",
 *          description="tracking",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="datalayer",
 *          description="datalayer",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pubished_at",
 *          description="pubished_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Product extends Model implements SluggableInterface, HasMediaConversions
{

    use SluggableTrait;

    use HasMediaTrait;

    use SoftDeletes;


    public function registerMediaConversions()
    {
        $this->addMediaConversion('list')->setManipulations(['w' => 368, 'h' => 232])->performOnCollections('product_images');
        $this->addMediaConversion('detail')->setManipulations(['w' => 368, 'h' => 232])->performOnCollections('product_images');
        $this->addMediaConversion('detail_thumb')->setManipulations(['w' => 368, 'h' => 232])->performOnCollections('product_images');
    }






    public $table = 'products';

    protected $guarded = ['id'];



    protected $dates = ['deleted_at'];


    public $fillable = [
        'slug', 'is_published', 'availability', 'manufacturer', 'product_line', 'status', 'office_status', 'guid', 'asin', 'model', 'sku', 'upc', 'mpn', 'name', 'subtitle', 'short_description', 'description', 'category', 'meta_title', 'meta_description', 'facebook_title', 'google_plus_title', 'twitter_title', 'price', 'promo_price', 'msrp_price', 'dealer_price', 'employee_price', 'sale_price', 'sale_price_coupon_code', 'sale_price_start_date', 'sale_price_end_date', 'quantity', 'tax_id', 'tax_status', 'tax_class', 'video_url', 'list_item_1', 'list_item_2', 'list_item_3', 'list_item_4', 'list_item_5', 'list_item_6', 'path', 'file_name', 'file_size', 'image_alt', 'primary_image_label', 'primary_image_file_size', 'primary_image', 'second_image_label', 'second_image_file_size', 'second_image', 'third_image_label', 'third_image_file_size', 'third_image', 'fourth_image_label', 'fourth_image_file_size', 'fourth_image', 'fifth_image_label', 'fifth_image_file_size', 'fifth_image', 'product_doc', 'product_doc_label', 'product_doc_file_size', 'tracking', 'datalayer', 'pubished_at', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'slug' => 'string',
        'ispromo' => 'boolean',
        'is_published' => 'boolean',
        'availability' => 'string',
        'manufacturer' => 'string',
        'product_line' => 'string',
        'status' => 'string',
        'office_status' => 'string',
        'guid' => 'string',
        'asin' => 'string',
        'model' => 'string',
        'sku' => 'string',
        'upc' => 'string',
        'mpn' => 'string',
        'name' => 'string',
        'subtitle' => 'string',
        'short_description' => 'string',
        'description' => 'string',
        'category' => 'string',
        'meta_title' => 'string',
        'meta_description' => 'string',
        'facebook_title' => 'string',
        'google_plus_title' => 'string',
        'twitter_title' => 'string',
        'price' => 'integer',
        'promo_price' => 'integer',
        'msrp_price' => 'integer',
        'dealer_price' => 'integer',
        'employee_price' => 'integer',
        'sale_price' => 'integer',
        'sale_price_coupon_code' => 'string',
        'quantity' => 'integer',
        'tax_id' => 'integer',
        'tax_status' => 'string',
        'tax_class' => 'string',
        'video_url' => 'string',
        'list_item_1' => 'string',
        'list_item_2' => 'string',
        'list_item_3' => 'string',
        'list_item_4' => 'string',
        'list_item_5' => 'string',
        'list_item_6' => 'string',
        'path' => 'string',
        'file_name' => 'string',
        'file_size' => 'integer',
        'image_alt' => 'string',
        'primary_image_label' => 'string',
        'primary_image_file_size' => 'integer',
        'primary_image' => 'string',
        'second_image_label' => 'string',
        'second_image_file_size' => 'integer',
        'second_image' => 'string',
        'third_image_label' => 'string',
        'third_image_file_size' => 'integer',
        'third_image' => 'string',
        'fourth_image_label' => 'string',
        'fourth_image_file_size' => 'integer',
        'fourth_image' => 'string',
        'fifth_image_label' => 'string',
        'fifth_image_file_size' => 'integer',
        'fifth_image' => 'string',
        'product_doc' => 'string',
        'product_doc_label' => 'string',
        'product_doc_file_size' => 'integer',
        'tracking' => 'string',
        'datalayer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'name' => 'required',
        'slug' => 'required'
    ];


    protected $sluggable = array(
         'build_from' => 'name',
         'save_to' => 'slug',
     );


    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }



    public function getUrlAttribute()
    {
        return 'shop/' . $this->attributes['slug'];
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }



    public function category()
    {
        $categories = $this->hasOne(Category::class, 'id', 'category_id') ->select(['id', 'title']);

        return $categories;
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function cat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function productFeatures()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function salesOrderProduct()
    {
        return $this->hasMany(SaleorderProduct::class, 'product_id');
    }

    public function invoiceProduct()
    {
        return $this->hasMany(InvoiceProduct::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function productImages()
    {
        return $this->hasMany(Image::class, 'product_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class);
    }
}
