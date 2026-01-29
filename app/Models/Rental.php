<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table='rentals';
    protected $fillable = ['room_id', 'tenant_id', 'move_in_date', 'move_out_date','rent_amount', 'status'];
    
    protected $appends = ['paid_months', 'rent_amount_numeric'];

    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }

    /**
     * Get array of months that have been paid for this rental
     */
    public function getPaidMonthsAttribute()
    {
        return $this->payments()->pluck('pay_month')->toArray();
    }

    /**
     * Get numeric rent amount (removes any currency formatting)
     */
    public function getRentAmountNumericAttribute()
    {
        return (float) preg_replace('/[^0-9.]/', '', $this->rent_amount);
    }
}
