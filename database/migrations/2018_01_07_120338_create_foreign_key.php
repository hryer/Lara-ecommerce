<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games',function (Blueprint $table){
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade');
        });

        Schema::table('carts',function (Blueprint $table){
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::table('transactions',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
