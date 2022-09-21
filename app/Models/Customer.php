<?php

namespace App\Models;

use App\Models\ImageCollection;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    public $guarded = [];

    public function photos()
    {
        return $this->hasMany(ImageCollection::class);
    }

    
}
