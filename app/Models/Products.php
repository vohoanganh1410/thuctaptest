<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'pro_name',
        'pro_slug',
        'pro_price',
        'pro_img' ,
        'pro_warranty',
        'pro_accessories',
        'pro_condition',
        'pro_promotion',
        'pro_status',
        'pro_description',
        'pro_featured',
        
    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}