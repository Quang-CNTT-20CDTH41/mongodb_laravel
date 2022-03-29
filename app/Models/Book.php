<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function scopeSearch($query)
    {
        if ($search = request()->search) {
            return $query->where('name', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
