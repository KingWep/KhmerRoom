<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $fillable = ['user_id','name', 'phone','gender', 'address'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function rentals(){
        return $this->hasMany(Rental::class);
    }
    public function activeRental()
    {
        return $this->hasOne(Rental::class)->where('status', 'ongoing');
    }
}
