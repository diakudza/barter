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
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('image_type');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->enum('image_type', ['ad', 'ad_main', 'avatar'])->default('ad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('image_type');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->integer('image_type')->nullable();
        });
    }
};
