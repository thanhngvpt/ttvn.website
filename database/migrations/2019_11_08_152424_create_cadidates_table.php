<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatecadidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadidates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('file')->nullable();
            $table->string('link_job')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('cadidates', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadidates');
    }
}
