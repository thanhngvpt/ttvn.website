<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatealterLeaderShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leader_ships', function (Blueprint $table) {
            $table->text('file_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
