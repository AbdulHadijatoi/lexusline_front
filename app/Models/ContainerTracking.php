<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContainerTracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'aejea' => 'date',
        'qict' => 'date',
        'pict_kgtl' => 'date',
    ];

    public function originPort(){
        return $this->belongsTo(Port::class,"origin_port_id");
    }
    
    public function destinationPort(){
        return $this->belongsTo(Port::class,"destination_port_id");
    }
}
