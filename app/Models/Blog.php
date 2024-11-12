<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogContents(){
        return $this->hasMany(Blog::class, 'blog_id');
    }
    
    public function blogContent(){
        return $this->hasOne(Blog::class, 'blog_id')->latest('id');
    }
}
