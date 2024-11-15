<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->hero_image ? url(Storage::url($this->hero_image)) : null;
    }

    public function pageContents(){
        return $this->hasMany(PageContent::class, 'page_id');
    }
    
    public function pageContent(){
        return $this->hasOne(PageContent::class, 'page_id')->latest('id');
    }
}
