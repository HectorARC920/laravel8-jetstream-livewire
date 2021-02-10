<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->BelongsTo(User::class); 
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getExcerptAttribute()
    {
        return substr($this->description,0,80) . "...";
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function similar()
    {
        return $this->where('category_id', $this->category_id)
            ->where('id', '!=',$this->id)
            ->with('user')
            ->take(2)
            ->get();
    }
}
