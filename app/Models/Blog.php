<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s', // Ensures consistent formatting
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
