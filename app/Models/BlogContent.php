<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogContent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? url(Storage::url($this->image)) : null;
    }

    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
