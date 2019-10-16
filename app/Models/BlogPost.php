<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
use SoftDeletes; // подключили трейт
    //тоесть показать без удаленных
    //запрос изменился на select * from `blog_posts` where `blog_posts`.`deleted_at` is null -- добавилось where

    /**
     * Категория статьи
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        //статья принадлежит категории
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * Автор статьи
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        //статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }

}
