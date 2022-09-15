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
        Schema::table('chats', function(Blueprint $table){
            $table->unsignedBigInteger('chat_type_id')->default(1);
            $table->foreign('chat_type_id')->references('id')->on('chat_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function(Blueprint $table){
            $table->dropForeign(['chat_type_id']);
            $table->dropColumn('chat_type_id');
        });
    }
};
