<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'client_name', 'project_title', 'slug', 'project_details', 'cover_photo', 'gallery_photos', 'status'
    ];

    protected $casts = [
        'gallery_photos' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($project) {
            $project->slug = Str::slug($project->project_title);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
