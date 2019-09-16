<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
use SoftDeletes; // подключили трейт
    //тоесть показать без удаленных
    //запрос изменился на select * from `blog_posts` where `blog_posts`.`deleted_at` is null -- добавилось where
}
