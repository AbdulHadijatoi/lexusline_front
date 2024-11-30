<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terminal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    
    public function vesselTrackings(){
        return $this->hasMany(VesselTracking::class, 'terminal_id');
    }
}
