<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News as N;

class Category extends Model
{
    use HasFactory;

    public function newsInfo()
    {
        return $this->belongsTo(N::class, 'category_id', 'id');
    }
}
