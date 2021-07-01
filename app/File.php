<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['path'];

    public static function getAllFile()
    {
        return  File::orderBy('id', 'ASC')->paginate(10);
    }
    public function surveys()
    {
        return $this->hasMany('App\Survey', 'dirpath_id', 'id');
    }
}
