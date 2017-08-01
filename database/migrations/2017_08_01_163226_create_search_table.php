<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SearchTable', function(Blueprint $table ){
            $table->increments('id');
            $table->string('plurk_id', 16);
            $table->string('card_name')->nullable();
            $table->boolean('candy_or_drink')->nullable();
            $table->string('skill')->nullable();
            $table->smallInteger('cost')->nullable();
            $table->smallInteger('price_less_than')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SearchTable');
    }
}
