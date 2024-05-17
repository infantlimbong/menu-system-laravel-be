<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'chinese_category',
        'indonesian_category',
        'english_category',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
