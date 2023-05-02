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
        Schema::create('okullars', function (Blueprint $table) {
            $table->id();
            $table->string('il_adi');
            $table->unsignedBigInteger('il_kodu');
            $table->string('ilce_adi');
            $table->unsignedBigInteger('ilce_kodu');
            $table->string('okul_adi');
            $table->string('okul_website');
            $table->string('tip');

            $table->foreign('il_kodu')->references('id')->on('okullars');
            $table->foreign('ilce_kodu')->references('id')->on('okullars');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('okullars');
    }
};
