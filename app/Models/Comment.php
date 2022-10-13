<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News as N;
use App\Models\User as U;
use Carbon\Carbon;

class Comment extends Model
{
    protected $fillable = ['comment'];
    use HasFactory;

    public function userInfo()
    {
        return $this->belongsTo(U::class, 'user_id', 'id');
    }

    public function newsInfo()
    {
        return $this->belongsTo(N::class, 'news_id', 'id');
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }

}
