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
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('brand');        // ماركة السيارة (Toyota, Hyundai)
        $table->string('model');        // الموديل (Elantra 2025)
        $table->string('plate_number'); // رقم اللوحة
        $table->integer('capacity');     // عدد المقاعد
        $table->decimal('price_per_day', 8, 2); // سعر الإيجار اليومي
        $table->string('status')->default('available'); // حالة السيارة (متاحة، في رحلة)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
