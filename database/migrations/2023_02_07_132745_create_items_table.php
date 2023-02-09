<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id');
            $table->string('name');
            $table->string('number');
            $table->string('description', 5000);
            $table->integer('quantity');
            $table->double('price_per_unit')->default(0);
            $table->double('base_price_per_unit')->default(0);
            $table->double('discount')->default(0);
            $table->string('image')->nullable();
            $table->double('rating');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
