<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    /**
     * @url https://laravel.com/docs/5.8/collections
     * @url https://laravel.com/api/5.8/Illuminate/Support/Collection.html
     * @url https://laravel.com/api/5.8/Illuminate/Database/Eloquent/Collection.html
     */

    public function collections()
    {
        $result = [];

        /**
         * @var \Illuminate\Database\Eloquent\Collection $eloquentCollection;
         */
        $eloquentCollection = BlogPost::withoutTrashed()->get(); // получить все данные включая удаленные

    //    dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        /**
         * @var  \Illuminate\Support\Collection $collection
         */
        $collection = collect($eloquentCollection->toArray()); //создаем коллекцию

       // dd(get_class($eloquentCollection),get_class($collection), $collection);

    //    $result['first'] = $collection->first();// первый элемент в коллекции
    //    $result['last'] = $collection->last();

        //выборка
      /*  $result['where']['data'] = $collection
            ->where('category_id', 10)
            ->values()   //только значения
            ->keyBy('id');*/
/*
        $result['where']['count'] = $result['where']['data']->count();
        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();*/

     /*   $result['where_first'] = $collection
            ->firstWhere('created_at','>', '2019-01-17 01:35:11');*/

        //мутация колекции в какой либо класс
        // не изменяет старую колекцию - возвращает новую
        //$collection->transform -меняет старую
     /*   $collection->map(function ($item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            return $newItem;
        });*/




    }
}
