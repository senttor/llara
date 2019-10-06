<?php

namespace App\Http\Controllers\Blog\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Blog\BaseController as GuestBaseContoller;

abstract  class  BaseController extends GuestBaseContoller
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }
}
