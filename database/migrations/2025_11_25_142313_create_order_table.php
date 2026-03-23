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
        Schema::create('order', function (Blueprint $table) {
            $table->id('OrderID');
            $table->date('Order_date');
            $table->unsignedBigInteger('UID');
            $table->string('full_name');
            $table->string('email');
            $table->string('address_line1');
            $table->string('city');
            $table->string('zip');
            $table->decimal('TotalPrice', 10, 2)->default(0);
            $table->string('Status')->default('Pending');
            $table->timestamps();

            $table->foreign('UID')->references('UID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};