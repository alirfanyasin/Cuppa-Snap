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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('menu_id')->constrained();
            // $table->foreignId('cart_id')->constrained();
            // $table->unsignedBigInteger('total')->nullable();
            // $table->string('code')->nullable();
            // $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
