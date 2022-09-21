<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageCollection extends Model
{
    use HasFactory;

    public $guarded = [];

    public function photo_path() {
        return Storage::url('admin/post/' . $this->file_name);
    }

    public function company_photo_path(){
        return Storage::url('admin/company/' . $this->file_name);

    }

    public function customer_photo_path(){
        return Storage::url('admin/customer/' . $this->file_name);

    }
}
