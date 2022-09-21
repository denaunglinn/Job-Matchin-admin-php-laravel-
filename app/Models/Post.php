<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ImageCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','description','category_id'];

    public function photos()
    {
        return $this->hasMany(ImageCollection::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
