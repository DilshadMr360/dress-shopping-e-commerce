<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_title',
        'product_description',
        'price',
        'upload_part_image',
        'category_id'
    ];


    public function category(){
        return $this->belongsTo(Category::class, 'category_id');

    }
}
