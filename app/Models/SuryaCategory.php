<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SuryaCategory extends Model
{
        use HasFactory;

    protected $table = 'surya_categories';

     public function items()
    {
        return $this->hasMany(SuryaItem::class, 'category_id');
    }
}
