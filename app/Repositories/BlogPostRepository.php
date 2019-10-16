<?php


namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BlogPostRepositories
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * Получить список статей для вывода в списке -админки
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
          'id',
          'title',
          'slug',
          'is_published',
          'published_at',
          'user_id',
          'category_id'
        ];
        $result = $this->startConditions() //создается новый экземпляр класс App\Models\BlogPost as Model
            ->select($columns)
            ->orderBy('id', 'DESC')
            //->with(['category', 'user']) //жадная загрузка - существенно уменьшает кол-во запросов
            //загрузить отношение - что бы потом можно было с ним работать
                //подгружаем полностью
                ->with([
                    //this
                    'category' => function($query) {
                    $query->select(['id','title']);
                    },
                //or
                'user:id,name',
            ])
            ->paginate(25);
        return $result;
    }
}