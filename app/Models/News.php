<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category as C;
use App\Models\Comment as Com;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;

    public function categoryInfo()
    {
        return $this->belongsTo(C::class, 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Com::class, 'news_id', 'id');
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->updated_at);
    }
}
