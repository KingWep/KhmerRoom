<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = ['rental_id', 'amount_paid', 'paid_date', 'status'];
    public function rental(){
        return $this->belongsTo(Rental::class);
    }
}
