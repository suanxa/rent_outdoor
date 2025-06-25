<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuryaItem extends Model
{
    use HasFactory;

    protected $table = 'surya_items';
    protected $guarded = [];

    // Relasi ke SuryaRental via tabel pivot surya_rental_items
    public function rentals()
    {
        return $this->belongsToMany(SuryaRental::class, 'surya_rental_items')
                    ->withPivot('quantity', 'subtotal_price')
                    ->withTimestamps();
    }

        public function category()
    {
        return $this->belongsTo(SuryaCategory::class, 'category_id');
    }
}
