<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public $photo_saved_path = 'admin/post/';


    public function index(){
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function create(Request $request){   
        $categories = Category::all();
        $sub_categories = SubCategory::find($request->sub_category_id);
        return view('admin.posts.create',compact('categories','sub_categories'));
    }

    public function show(){
            
        }

    public function store(Request $request){

        $photonames = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $each_photo) {
                $photoname = uniqid() . '_' . date('Y-m-d-H-i-s') . '.' . $each_photo->getClientOriginalExtension();
                Storage::put(
                    $this->photo_saved_path . $photoname,
                    file_get_contents($each_photo->getRealPath())
                );
                $photonames[] = ['file_name' => $photoname];
            }
        }

        
        $post = Post::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $photonames[] = ['post_id' => $post->id];

        if (count($photonames)) {
            $post->photos()->createMany($photonames);
        }

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post,Request $request){
        $post = Post::find($post->id);
        $categories = Category::all();
        $sub_categories = SubCategory::find($post->category->sub_category->id);
        return view('admin.posts.edit',compact('categories','sub_categories','post'));
    }

    public function update(Post $post,Request $request){
       
        $photonames = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $each_photo) {
                $photoname = uniqid() . '_' . date('Y-m-d-H-i-s') . '.' . $each_photo->getClientOriginalExtension();
                Storage::put(
                    $this->photo_saved_path . $photoname,
                    file_get_contents($each_photo->getRealPath())
                );
                $photonames[] = [
                    'file_name' => $photoname];
            }
        }

        $post->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if (count($photonames)) {
            foreach ($post->photos as $photo) {
                Storage::delete($this->photo_saved_path . $photo->name);
                $photo->delete();
            }

            $post->photos()->createMany($photonames);
        }

        return redirect()->route('admin.posts.index');

    }

    public function destroy(Post $post){
        if (isset($post->photos[0])) {
            foreach ($post->photos as $photo) {
                Storage::delete($this->photo_saved_path . $photo->name);
                $photo->delete();
            }
        }

        $post->delete();
        return redirect()->route('admin.posts.index');

    }
}
