<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class   PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BlogPost::all();
        dd($items[1]);
        output:
        BlogPost {#454 ▼
        #connection: "mysql"
        #table: "blog_posts"
        #primaryKey: "id"
        #keyType: "int"
        +incrementing: true
        #with: []
        #withCount: []
        #perPage: 15
        +exists: true
        +wasRecentlyCreated: false
        #attributes: array:13 [▶]
        #original: array:13 [▶]
        #changes: []
        #casts: []
        #dates: []
        #dateFormat: null
        #appends: []
        #dispatchesEvents: []
        #observables: []
        #relations: []
        #touches: []
        +timestamps: true
  #hidden: []
  #visible: []
  #fillable: []
  #guarded: array:1 [▶]

        return view('blog.posts.index', compact('items'));
        // resources/views/blog/posts/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
