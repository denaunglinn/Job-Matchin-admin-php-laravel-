<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    public function index(){
        return view('admin.trend-posts.index');
    }
}
