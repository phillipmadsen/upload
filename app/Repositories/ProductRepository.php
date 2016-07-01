<?php

namespace Fully\Repositories;

use Fully\Models\Img;
use Illuminate\Support\Str;
use File;
use Input;
use Fully\Models\Product;
use Elequent;
use InfyOm\Generator\Common\BaseRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class ProductRepository extends BaseRepository
{



    protected $fieldSearchable = [
        'slug',
        'ispromo',
        'availability',
        'product_line',
        'guid',
        'asin',
        'model',
        'name',
        'category'
    ];



    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }


    public function uploadProductImage(UploadedFile $file)
      {
        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $slug = $file->getClientOriginalName();
        $slug = pathinfo($filename, 0, strrpos($filename, PATHINFO_FILENAME));
        $destinationPath = public_path() . '/uploads/products/'. $slug;
        if(!file_exists($destinationPath)) File::makeDirectory($destinationPath);
        //$picture = Str::slug(substr($filename, 0, strrpos($filename, "."))) . '_' . time() . '.' . $extension;
        $picture = $slug . "." . $extension;
        return $file->move($destinationPath, $picture);
      }




    // public function create($attributes)
    // {
    //     $attributes['is_published'] = isset($attributes['is_published']) ? true : false;
    //     if ($this->isValid($attributes)) {
    //         //--------------------------------------------------------
    //         $file = null;
    //         if (isset($attributes['image'])) {
    //             $file = $attributes['image'];
    //         }
    //         if ($file) {
    //             $destinationPath = public_path().$this->imgDir;
    //             $fileName = $file->getClientOriginalName();
    //             $fileSize = $file->getClientSize();
    //             $upload_success = $file->move($destinationPath, $fileName);
    //             if ($upload_success) {
    //                 // resizing an uploaded file
    //                 Image::make($destinationPath.$fileName)->resize($this->width, $this->height)->save($destinationPath.$fileName);
    //                 // thumb
    //                 Image::make($destinationPath.$fileName)->resize($this->thumbWidth, $this->thumbHeight)->save($destinationPath.'thumb_'.$fileName);
    //                 $this->product->lang = $this->getLang();
    //                 $this->product->file_name = $fileName;
    //                 $this->product->file_size = $fileSize;
    //                 $this->product->path = $this->imgDir;
    //             }
    //         }
    //         //--------------------------------------------------------
    //         // $this->product->lang = $this->getLang();
    //         // if ($this->product->fill($attributes)->save()) {
    //         //     $category = Category::find($attributes['category']);
    //         //     $category->products()->save($this->product);
    //         // }
    //         //Event::fire('product.created', $this->product);
    //         Event::fire('product.creating', $this->product);
    //         return true;
    //     }
    //     throw new ValidationException('product validation failed', $this->getErrors());
    // }





	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function togglePublish($id)
	{
		$product = $this->product->find($id);

		$product->is_published = ($product->is_published) ? false : true;
		$product->save();

		return Response::json(array('result' => 'success', 'changed' => ($product->is_published) ? 1 : 0));
	}


}
