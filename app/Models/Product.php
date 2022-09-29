<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $imagename;
    private static $directory;
    private static $imageurl;

    public static function getImageUrl($image)
    {
        self::$imagename = $image->getClientOriginalname();
        self::$directory = 'product-images/';
        $image->move(self::$directory, self::$imagename);
        self::$imageurl = self::$directory . self::$imagename;
        return self::$imageurl;

    }

    public static function newProduct($request){
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::getImageUrl($request->file('image'));
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }

    public static function UpdateProduct($request, $id){
        self::$product = Product::find($id);
        if($request->file('image')){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }
            self::$imageurl = self::getImageUrl($request->file('image'));
        }else{
            self::$imageurl = self::$product->image;
        }

        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->image = self::$imageurl;
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public  function subImages(){
        return $this->hasMany(SubImage::class);
    }
}
