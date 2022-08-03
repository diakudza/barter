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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable('false');
            $table->text('title')->nullable('false');
            $table->text('text')->nullable('false');
            $table->integer('category_id')->nullable('false');
            $table->integer('city_id')->nullable('false');
            $table->enum('barter_type', ['barter', 'free'])->nullable('false');
            $table->integer('cost');
            $table->text('image');
            $table->enum('status',['active', 'archived', 'delete'])->default('active')->nullable('false');

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
        Schema::dropIfExists('ads');
    }
};
