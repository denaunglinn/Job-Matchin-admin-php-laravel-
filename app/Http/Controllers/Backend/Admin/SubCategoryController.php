<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCategory::all();
        return view('admin.sub_categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_categories.create',compact('categories'));

    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new SubCategory();
        $category->category_id = $request->category_id;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        
        return redirect()->route('admin.sub_categories.index');
    }
   
    public function edit($id)
    {
        $category = SubCategory::findOrFail($id);
        return view('admin.sub_categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request,$id)
    {
        $category = SubCategory::findOrFail($id);
        $category->category_id = $request->category_id;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->update();
        return redirect()->route('admin.sub_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $category)
    {
        $category = SubCategory::find($category->id);
        $category->delete();

        return redirect()->back();
    }
}
