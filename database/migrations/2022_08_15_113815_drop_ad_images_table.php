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
        Schema::dropIfExists('ad_images');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('ad_images', function (Blueprint $table) {
            $table->id();
            $table->integer('ad_id')->nullable(false);
            $table->integer('image_id')->nullable(false);
            $table->timestamps();
        });
    }
};
