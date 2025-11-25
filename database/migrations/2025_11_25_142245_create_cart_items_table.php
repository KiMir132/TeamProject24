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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('CartItemID');
            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->unsignedBigInteger('CartID');
            $table->unsignedBigInteger('ProductID');
            $table->timestamps();

            $table->foreign('CartID')->references('CartID')->on('cart')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
