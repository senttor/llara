<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    //
    use SoftDeletes;

    protected $fillable =
        [
            'title',
            'slug',
            'parent_id',
            'discription',
        ];// массов полей которых можно заполнить через fill()
}
