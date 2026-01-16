<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    protected $table = 'tenants';
    protected $fillable = ['user_id', 'phone','gender', 'address'];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function rentals(){
        return $this->hasMany(Rental::class);
    }
}
