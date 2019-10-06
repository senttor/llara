<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
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
        $item = new BlogCategory();
        $categoryList = BlogCategory::all();
        return view('blog.admin.categories.edit',
            compact('item', 'categoryList')
        );

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
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data['title']);
        }

        $item = new BlogCategory($data);
        dd($item);
        $item->save();

        if ($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'success saved']);
        } else {
            return back()->withErrors(['msg' => 'Saving errors'])
                ->withInput();
        }
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
    public function update(BlogCategoryUpdateRequest $request, $id) //ctrl + space - добавит namespace в шапку - use
    {
        /* $rules = [
             'title'       => 'required|min:5|max:200',
             'slug'        => 'max:200',
             'discription' => 'string|max:500|min:3',
             'parent_id'   => 'required|integer|exists:blog_categories,id',// в таблице blog_categories в id должно существовать
         ];*/
        // $validatedData = $this->validate($request, $rules); //1 способ валидации - к контроллеру
        //$validatedData = $request->validate($rules);//2 способ валидации - к реквесту
        //$validator = \Validator::make($request->all(). rules); //3 способ валидации
        // $validatedData [] =       //$validator->passes() // bool - прошел или нет
        //$validator->validate()
        //$validator->valid()
        //$validator->failed()
        //$validator->errors()
        //$validator->fails()
        //можно создавать свои собственные правила
//4 способ валидации


        //  dd($validatedData);

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
        //dd($data);
        $result = $item
            ->fill($data) //обновляет свойства обьекта - сопоставление свойств с разрешенными в модели
            ->save();  //запись в базу возращает boolean - удачно или нет

        if ($result) {
            // выполнить ридирект
            return redirect()
                // по маршуту
                ->route('blog.admin.categories.edit', $item->id)
                //сообщение через сессию
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
