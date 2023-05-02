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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('town_id');
            $table->unsignedBigInteger('okullar_id');
            $table->string('mail');
            $table->string('password');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('town_id')->references('id')->on('towns');
            $table->foreign('okullar_id')->references('id')->on('okullars');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
