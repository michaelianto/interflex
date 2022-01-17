<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'developer_id',
        'category_id',
        'release_date',
        'description',
        'price',
        'discount',
        'created_at'
    ];

    public function developer(){
        return $this->belongsTo(Developer::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
}
