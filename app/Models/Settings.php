<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'phone', 'public_email', 'about', 'institute', 'degree', 'photo', 'cover', 'resume', 'address', 'interests', 'awards', 'links', 'skills', 'languages', 'facts', 'educations', 'experiences', 'designation'];

    protected $casts = [
        'interests' => 'array',
        'awards' => 'array',
        'links' => 'array',
        'skills' => 'array',
        'languages' => 'array',
        'facts' => 'array',
        'educations' => 'array',
        'experiences' => 'array',
        'designation' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}