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
        Schema::create('logger', function (Blueprint $table) {
            $table->id();
            $table->string("parent");
            $table->string("name");
            $table->string("surname");
            $table->bigInteger("value");
            $table->integer("id_location");
            $table->integer("id_type");
            $table->dateTime("timestamp");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logger');
    }
};
