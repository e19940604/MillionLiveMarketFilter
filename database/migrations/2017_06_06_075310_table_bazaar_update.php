<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBazaarUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Bazaar', function(Blueprint $table){

            $table->tinyInteger('candyOrDrink');
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Bazaar', function(Blueprint $table){

            $table->dropColumn('candyOrDrink');
        } );
    }
}
