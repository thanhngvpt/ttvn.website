<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatealterInstroducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('introduces', function (Blueprint $table) {
            $table->text('content2')->nullable(); 
            $table->text('overview_intro2')->nullable(); 
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
