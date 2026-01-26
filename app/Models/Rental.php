<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table='rentals';
    protected $fillable = ['room_id', 'tenant_id', 'move_in_date', 'move_out_date','rent_amount', 'status'];
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
