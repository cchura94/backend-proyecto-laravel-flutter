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
        Schema::create('orden_producto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("orden_id")->unsigned();
            $table->bigInteger("producto_id")->unsigned();
            $table->integer("cantidad")->default(1);

            $table->foreign("orden_id")->references("id")->on("ordens");
            $table->foreign("producto_id")->references("id")->on("productos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_producto');
    }
};
