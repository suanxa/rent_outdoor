<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuryaCustomer extends Model
{
    use HasFactory;

    protected $table = 'surya_customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function rentals()
    {
        return $this->hasMany(SuryaRental::class);
    }
}
