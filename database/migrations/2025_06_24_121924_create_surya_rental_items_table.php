<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surya_rental_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('rental_id')->constrained('surya_rentals')->onDelete('cascade');
    $table->foreignId('item_id')->constrained('surya_items')->onDelete('cascade');
    $table->integer('quantity');
    $table->decimal('subtotal', 12, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surya_rental_items');
    }
};
