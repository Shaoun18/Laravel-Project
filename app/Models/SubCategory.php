<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subcategory;
    private static $imagename;
    private static $directory;
    private static $imageurl;

    public static function getImageUrl($image)
    {
        self::$imagename = $image->getClientOriginalname();
        self::$directory = 'subcategory-images/';
        $image->move(self::$directory, self::$imagename);
        self::$imageurl = self::$directory . self::$imagename;
        return self::$imageurl;

    }

    public static function newsubCategory($request)
    {
        self::$subcategory = new SubCategory();
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        self::$subcategory->image = self::getImageUrl($request->file('image'));
        self::$subcategory->status = $request->status;
        self::$subcategory->save();

    }
    public static function UpdateSubCategory($request, $id)
    {
        self::$subcategory = SubCategory::find($id);
        if($request->file('image')){
            if(file_exists(self::$subcategory->image)){
                unlink(self::$subcategory->image);
            }
            self::$imageurl = self::getImageUrl($request->file('image'));
        }
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        self::$subcategory->image = self::$imageurl;
        self::$subcategory->status = $request->status;
        self::$subcategory->save();

    }

    public static function deleteSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);
        if(file_exists(self::$subcategory->image)){
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();

    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
