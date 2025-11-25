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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('ReviewId');
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('UID');
            $table->float('Rating');
            $table->text('Description')->nullable();
            $table->timestamps();

            $table->foreign('ProductID')->references('ProductID')->on('product')->onDelete('cascade');
            $table->foreign('UID')->references('UID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
