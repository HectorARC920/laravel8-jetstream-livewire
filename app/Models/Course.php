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
    public function getExcerptAttribute()
    {
        return substr($this->description,0,80) . "...";
    }
}
