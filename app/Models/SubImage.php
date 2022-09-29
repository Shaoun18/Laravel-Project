<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    use HasFactory;
    private static $subImage;
    private static $subImages;
    private static $imagename;
    private static $directory;
    private static $imageurl;

    public static function getImageUrl($image)
    {
        self::$imagename = $image->getClientOriginalname();
        self::$directory = 'product-sub-images/';
        $image->move(self::$directory, self::$imagename);
        self::$imageurl = self::$directory . self::$imagename;
        return self::$imageurl;
    }

    public static function newSubImage($product, $subImages){
        foreach ($subImages as $subImage){
            self::$subImage = new subImage();
            self::$subImage->product_id = $product->id;
            self::$subImage->image = self::getImageUrl($subImage);
            self::$subImage->save();
        }
    }

    public static function updateSubImage($product, $subImages){
        self::$subImages = SubImage::where('product_id', '$product->id')->get();
        foreach (self::$subImages as $subImage){
            if (file_exists($subImage->image)){
                unlink($subImage->image);
            }
            $subImage->delete();
        }
        self::newSubImage($product, $subImages);
    }


    public static function deleteSubImage($id)
    {
        self::$subImages = SubImage::where('product_id', $id)->get();
        foreach (self::$subImages as $subImage)
        {
            if (file_exists($subImage->image))
            {
                unlink($subImage->image);
            }
            $subImage->delete();
        }
    }
}
