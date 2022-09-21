<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','description'];

    public function sub_category(){
        return $this->belongsTo(SubCategory::class, "id", "category_id");
    }
}
