<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('of_user')->unsigned();
            $table->foreign('of_user')->references('id')->on('users');
            
            
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email', 100);

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
        Schema::drop('contacts');
    }
}
