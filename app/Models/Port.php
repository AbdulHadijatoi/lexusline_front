<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    
    public function originContrainerTrackings(){
        return $this->hasMany(ContainerTracking::class,"origin_port_id");
    }
    
    public function destinationContrainerTrackings(){
        return $this->hasMany(ContainerTracking::class,"destination_port_id");
    }
    
    public function originVesselTrackings(){
        return $this->hasMany(VesselTracking::class,"origin_port_id");
    }
    
    public function destinationVesselTrackings(){
        return $this->hasMany(VesselTracking::class,"destination_port_id");
    }
}
