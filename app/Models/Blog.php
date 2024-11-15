<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? url(Storage::url($this->image)) : null;
    }
    
    public function blogContents(){
        return $this->hasMany(BlogContent::class, 'blog_id');
    }
    
    public function blogContent(){
        return $this->hasOne(BlogContent::class, 'blog_id')->latest('id');
    }
}
