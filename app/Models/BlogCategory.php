<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App\Models
 *
 * @property-read  BlogCategory $parentCategory
 * @property-read  string $parentTitle
 */

class BlogCategory extends Model
{

    use SoftDeletes;

    /*
     * id корня
     */
    const ROOT = 1;

    protected $fillable =
        [
            'title',
            'slug',
            'parent_id',
            'discription',
        ];// массив полей которых можно заполнить через fill()

    /**
     * Получить родительскую категорию
     * @return BlogCategory
     */
    public function parentCategory()
    {
        //текущая запись принадлежит какой-то записи из этой жже категории
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * читатель для ParentTitle - будет автоматически вызван при попытке доступа к  parentTitle
     * получим результат метода
     * Пример Аксесора автоматически вызывается при
     * @url https://laravel.com/docs/5.8/eloquent-mutators
     * https://laravel.ru/docs/v5/eloquent-mutators
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? (
            $this->isRoot()
                ? 'root'
                : '???!'
            );
        return $title;
    }

    /**
     * Является ли текущий обьект корневым
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

    /**
     * @param string $valueFromDB
     *
     * @return bool/mixed/null/string/string[]
     *
     * Пример Аксесора
     * применяется при $item->title
     */
    public function getTitleAttribute($valueFromObject)
    {
        return mb_strtoupper($valueFromObject);
    }

    /**
     * @param string $incomingValue
     *
     * Muttator example
     *
     * $item->title = 'some value' применится при сохранении
     */
    public function setTitleAttribute($incomingValue)
    {
        $this->attributes['title'] = mb_strtolower($incomingValue);
    }
}
