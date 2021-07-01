<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    protected $fillable = ['id', 'slug', 'title', 'idno', 'authoring_entity', 'nation', 'year_start', 'metafile', 'dirpath', 'keywords', 'total_view', 'total_download', 'review', 'sampling', 'data_collection', 'data_processing', 'status', 'cat_id', 'child_cat_id', 'dirpath_id'];
    public function cat_info()
    {
        return $this->hasOne('App\Category', 'id', 'cat_id');
    }
    public function sub_cat_info()
    {
        return $this->hasOne('App\Category', 'id', 'child_cat_id');
    }
    public function file_info()
    {
        return $this->hasOne('App\File', 'id', 'dirpath_id');
    }
    public static function getAllSurvey()
    {
        return Survey::with(['cat_info', 'sub_cat_info', 'file_info'])->orderBy('id', 'DESC')->paginate(10);
    }
    public function rel_prods()
    {
        return $this->hasMany('App\Survey', 'cat_id', 'cat_id')->where('status', 'active')->orderBy('id', 'DESC')->limit(8);
    }
    public static function getSurveyBySlug($slug)
    {
        return Survey::with(['cat_info', 'rel_prods'])->where('slug', $slug)->first();
    }
    public static function countActiveSurvey()
    {
        $data = Survey::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
}
