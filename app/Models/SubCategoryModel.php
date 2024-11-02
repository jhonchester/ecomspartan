<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_name',
        'category_id'
    ];


    public function category(){
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
}
