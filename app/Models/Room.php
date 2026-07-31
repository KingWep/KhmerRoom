<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table='rooms';
    protected $fillable = ['room_number', 'floor', 'price', 'width', 'length', 'size', 'status', 'images', 'description', 'accessories'];
    protected $casts = [
        'accessories' => 'array',
        'width' => 'decimal:2',
        'length' => 'decimal:2',
        'size' => 'decimal:2',
    ];

    /**
     * Auto-calculate size from width × length when both are provided.
     */
    protected static function booted(): void
    {
        static::saving(function (Room $room) {
            if ($room->width && $room->length) {
                $room->size = round($room->width * $room->length, 2);
            }
        });
    }
    
    // Accessor to generate room name
    public function getNameAttribute()
    {
        return 'បន្ទប់លេខ ' . $this->room_number;
    }

    /**
     * Get formatted dimensions string (e.g. "4.00m × 5.00m").
     */
    public function getDimensionsAttribute(): ?string
    {
        if ($this->width && $this->length) {
            return number_format($this->width, 2) . 'm × ' . number_format($this->length, 2) . 'm';
        }
        return null;
    }
    
    public function rentals(){
        return $this->hasMany(Rental::class);
    }
}
