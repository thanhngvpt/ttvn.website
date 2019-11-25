<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatefieldtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->bigInteger('home_image_id')->default(0);
            $table->bigInteger('cover2_image_id')->default(0);
            $table->string('home_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('fieldtables');
    }
}
