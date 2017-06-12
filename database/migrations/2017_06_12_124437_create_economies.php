<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEconomies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('economy', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('of_user')->unsigned();
            $table->foreign('of_user')->references('id')->on('users');
            
            
            $table->string('desc');
            $table->decimal('value', 15, 2);

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
        Schema::drop('economy');
    }
}
