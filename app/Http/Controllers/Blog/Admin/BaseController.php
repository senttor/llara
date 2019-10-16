<?php

namespace App\Http\Controllers\Blog\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Blog\BaseController as GuestBaseContoller;

/**
 * Базовый  контроллер для всех контролеров управления блогом в панели администрирования
 * Class BaseController
 * @package App\Http\Controllers\Blog\Admin
 */
abstract  class  BaseController extends GuestBaseContoller
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        //инициализация  общих составляющих для админки
    }
}
