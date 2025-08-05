<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($blogCategory) {
            $blogCategory->slug = Str::slug($blogCategory->name);
        });

        static::updating(function ($blogCategory) {
            $blogCategory->slug = Str::slug($blogCategory->name);
        });
    }
}
