<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BelongToMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'parent_id',
        'status',     
    ];
    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
    
}
