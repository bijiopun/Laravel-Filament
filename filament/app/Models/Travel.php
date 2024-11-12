<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';  // Perubahan dari 'travel' ke 'travels'
    protected $fillable = ['name', 'description'];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
