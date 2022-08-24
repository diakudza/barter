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
        Schema::create('voted_voters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('voter_id');
            $table->foreign('voter_id')->references('id')->on('users');
            $table->unsignedBigInteger('voted_id');
            $table->foreign('voted_id')->references('id')->on('users');
            $table->unique(['voter_id', 'voted_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voted_voters');
    }
};
