<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category as C;

class News extends Model
{
    use HasFactory;

    public function categoryInfo()
    {
        return $this->hasMany(C::class, 'id', 'category_id');
    }
}
