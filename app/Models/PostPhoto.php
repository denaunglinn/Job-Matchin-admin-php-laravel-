<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostPhoto extends Model
{
    use HasFactory;

    public $guarded = [];

    public function photo_path() {
        return Storage::url('admin/post/' . $this->file_name);
    }
}
