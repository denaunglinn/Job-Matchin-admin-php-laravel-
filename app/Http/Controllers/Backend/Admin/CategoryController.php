<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request){
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        
        return redirect()->route('admin.categories.index');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(StoreCategoryRequest $request,$id){
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->update();
        return redirect()->route('admin.categories.index');
    }

    public function show(){

    }

    public function destroy(Category $category){

        $category = Category::find($category->id);
        $category->delete();

        return redirect()->back();
    }


}
