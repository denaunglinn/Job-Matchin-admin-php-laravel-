<?php

namespace App\Models;

use App\Models\CompanyType;
use App\Models\ImageCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    
    public $guarded = [];

    public function photos()
    {
        return $this->hasMany(ImageCollection::class);
    }

    public function company_type(){
        return $this->belongsTo(CompanyType::class, "company_type_id", "id");
    }

}
