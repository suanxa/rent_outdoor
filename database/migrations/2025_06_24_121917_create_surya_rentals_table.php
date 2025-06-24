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
        Schema::create('surya_rentals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('customer_id')->constrained('surya_customers')->onDelete('cascade');
    $table->foreignId('user_id')->constrained('surya_users')->onDelete('cascade');
    $table->date('rental_date');
    $table->date('return_date');
    $table->enum('status', ['booked', 'ongoing', 'completed', 'cancelled']);
    $table->decimal('total_price', 12, 2);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surya_rentals');
    }
};
