<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VesselTracking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'eta_jea' => 'date',
        'eta_kict' => 'date',  // Add this line for `eta_kict` if needed
    ];

    public function terminal(){
        return $this->belongsTo(Terminal::class,"terminal_id");
    }

    public function originPort(){
        return $this->belongsTo(Port::class,"origin_port_id");
    }
    
    public function destinationPort(){
        return $this->belongsTo(Port::class,"destination_port_id");
    }
}
