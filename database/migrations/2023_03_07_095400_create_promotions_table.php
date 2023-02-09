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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promotion_type_id');
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('content', 5000);
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('image');
            $table->foreign('promotion_type_id')->references('id')->on('promotion_types');
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
        Schema::dropIfExists('promotions');
    }
};
