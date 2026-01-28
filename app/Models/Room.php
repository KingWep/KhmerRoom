<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable = ['room_number', 'floor', 'price', 'status', 'images', 'description', 'size', 'accessories'];
    protected $casts = [
        'accessories' => 'array',
    ];
    
    // Accessor to generate room name
    public function getNameAttribute()
    {
        return 'បន្ទប់លេខ ' . $this->room_number;
    }
    
    public function rentals(){
        return $this->hasMany(Rental::class);
    }
}
