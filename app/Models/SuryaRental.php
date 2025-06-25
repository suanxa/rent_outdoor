<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuryaRental extends Model
{
    use HasFactory;

    protected $table = 'surya_rentals';

    protected $fillable = [
        'customer_id',
        'rental_date',
        'return_date',
        'status',
        'total_price',
    ];

    // Relasi ke SuryaItem via tabel pivot surya_rental_items
    public function items()
    {
        return $this->belongsToMany(SuryaItem::class, 'surya_rental_items')
                    ->withPivot('quantity', 'subtotal_price')
                    ->withTimestamps();
    }

    public function customer()
{
    return $this->belongsTo(Customer::class);
}

}
