<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBazaarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Bazaar', function(Blueprint $table){

            $table->string('type', 2)->default('EX');
            $table->string('idolName', 16);
            $table->string('skillRange', 16)->nullable();
            $table->string('skillPower', 16)->nullable();
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

            $table->dropColumn('type');
            $table->dropColumn('idolName');
            $table->dropColumn('skillRange');
            $table->dropColumn('skillPower');
        } );
    }
}
