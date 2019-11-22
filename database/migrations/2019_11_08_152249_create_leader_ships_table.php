<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateleaderShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leader_ships', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('file')->nullable();
            $table->bigInteger('order')->nullable();
            $table->boolean('is_enabled')->default(true);

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('leader_ships', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leader_ships');
    }
}
