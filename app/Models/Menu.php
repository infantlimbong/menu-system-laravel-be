<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'chinese_menu',
        'indonesian_menu',
        'english_menu',
        'small_price',
        'medium_price',
        'large_price',
        'stock',
        'chinese_desc',
        'indonesian_desc',
        'english_desc',
        'image',
        'best_selling',
    ];
}
