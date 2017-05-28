<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bazaar' , function(Blueprint $table ){
            $table->string('id', 32 );
            $table->string('name');
            $table->smallInteger('cost');
            $table->string('skill')->nullable();
            $table->string('price');
            $table->string('transactionUrl');
            $table->timestamp('postDate');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Bazaar');
    }
}
