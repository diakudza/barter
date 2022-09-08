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
        Schema::table('ads', function (Blueprint $table){
            $table->text('barter_title')->after('cost')->nullable();
            $table->text('barter_text')->after('barter_title')->nullable();
            $table->unsignedBigInteger('barter_category_id')->after('barter_title')->nullable();
            $table->foreign('barter_category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function(Blueprint $table){
            $table->dropColumn('barter_title');
            $table->dropColumn('barter_text');
            $table->dropColumn('barter_category_id');
        });
    }
};
