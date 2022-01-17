<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'image'
    ];

    public function game(){
        return $this->belongsTo(Game::class);
    }
}
