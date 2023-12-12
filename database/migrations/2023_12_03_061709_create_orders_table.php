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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('menu_id')->constrained();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->unsignedInteger('quantity');
            $table->string('order_type');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->default('Pending')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
