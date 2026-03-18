<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up()
{
    Schema::table('order', function (Blueprint $table) {
        $table->string('full_name')->nullable();
        $table->string('email')->nullable();
        $table->string('address_line1')->nullable();
        $table->string('city')->nullable();
        $table->string('zip')->nullable();
    });
}

   
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            //
        });
    }
};
