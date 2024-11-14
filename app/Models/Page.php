<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pageContents(){
        return $this->hasMany(Page::class, 'page_id');
    }
    
    public function pageContent(){
        return $this->hasOne(PageContent::class, 'page_id')->latest('id');
    }
}
