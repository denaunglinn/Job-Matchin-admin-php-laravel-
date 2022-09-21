<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public  function subCategories(Request $request){
        if ($request->ajax()) {
            $sub_categories = SubCategory::where('category_id',$request->category)->get();

            return response()->json([
                'result' => 1,
                'message' => 'success',
                'data' => $sub_categories,
            ]);

        }

    }
}
