<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class  CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $xxx = BlogCategory::all();
        $paginator = BlogCategory::paginate(15); // все єлементы из базы данных,
        // на одну страницу по 5 елементов
//dd($paginator);
        //   dd($xxx, $paginator);

        return view('blog.admin.categories.index', compact('paginator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //admin/blog/categories/create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);//find  , findOrFail - если не найдет возврат 404., where('id', $id)->get() - колекция где ид = $id
        //
        $categoryList = BlogCategory::all();
        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //save category     path ==> admin/blog/categories
        //dd(__METHOD__, $request->all(), $id);
        $item = BlogCategory::find($id);
        if (empty($item)) {
            return back()   // helper function redirect back - можно указать код ошибки
                ->withErrors(['msg' => "Запись id=[{$id}] запись не найдена"])
                ->withInput(); // вернуть то что пришло к нам
                               //например данные введенные в форму
        }
        $data = $request->all();
        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'success saved']);
        } else {
            return back()
                ->withErrors(['msg' => 'saving error'])
                ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
