<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\SuryaCustomer;


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
    return $this->belongsToMany(SuryaItem::class, 'surya_rental_items', 'rental_id', 'item_id')
                ->withPivot('quantity', 'subtotal')
                ->withTimestamps();
}


    public function customer()
{
    return $this->belongsTo(SuryaCustomer::class, 'customer_id');
}

}
