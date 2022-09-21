<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Company;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostListResource;

class DataController extends Controller
{
    public function categoryList(){
        $category = Category::all();

        return response()->json([
            'status' => 1,
            'data' => $category,
        ]);
    }

    public function subCategoryList(){
        $sub_category = SubCategory::all();

        return response()->json([
            'status' => 1,
            'data' => $sub_category,
        ]);
    }

    public function postList(Request $request){
        $posts = Post::all();
        $data = PostListResource::collection($posts);

        return response()->json([
            'status' =>1,
            'data' => $data,
        ]);
    }

    public function postSearch(Request $request){
        $posts = Post::query();

        if($request->key){
            $posts = $posts->where('title', 'LIKE', "%{$request->key}%") 
            ->orWhere('description', 'LIKE', "%{$request->key}%");
        }

        $data = PostListResource::collection($posts->get());

        return response()->json([
            'status' =>1,
            'data' => $data,
        ]);
    }

    public function categorySearch(Request $request){
        $key = $request->key ?? 'all';
        $data = [];
        if($request->key){
            $posts = Post::query();
            if($key != 'all'){
                $posts = $posts->whereHas('category',function($query) use ($key){
                    $query->where('title', 'LIKE', "%{$key}%");
                });
            }
            $data = PostListResource::collection($posts->get());
        }

        return response()->json([
            'status' =>1,
            'data' => $data,
        ]);
    }

    public function companyList(){
        $company = Company::all();
        return response()->json([
            'status' => 1,
            'data' => $company,
        ]);
    }
}
