<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'photo', 'status', 'is_parent', 'parent_id'];
    public function parent_info()
    {
        return $this->hasOne('App\Category', 'id', 'parent_id');
    }
    public static function getAllCategory()
    {
        return  Category::orderBy('id', 'ASC')->with('parent_info')->paginate(10);
    }

    public static function shiftChild($cat_id)
    {
        return Category::whereIn('id', $cat_id)->update(['is_parent' => 1]);
    }
    public static function getChildByParentID($id)
    {
        return Category::where('parent_id', $id)->orderBy('id', 'ASC')->pluck('title', 'id');
    }

    public function child_cat()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id')->where('status', 'active');
    }
    public static function getAllParentWithChild()
    {
        return Category::with('child_cat')->where('is_parent', 1)->where('status', 'active')->orderBy('title', 'ASC')->get();
    }
    public function surveys()
    {
        return $this->hasMany('App\Survey', 'cat_id', 'id')->where('status', 'active');
    }
    public function sub_survey()
    {
        return $this->hasMany('App\Survey', 'child_cat_id', 'id')->where('status', 'active');
    }
    public static function getSurveyByCat($slug)
    {
        //dd($slug);
        return Category::with('surveys')->where('slug', $slug)->first();
        // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    }
    public static function getSurveyBySubCat($slug)
    {
        // return $slug;
        return Category::with('sub_survey')->where('slug', $slug)->first();
    }
    public static function countActiveCategory()
    {
        $data = Category::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
}
