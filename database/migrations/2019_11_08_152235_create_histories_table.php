<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatehistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('date_start')->nullable();
            $table->bigInteger('cover_image_id')->default(0);
            $table->text('content')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('histories', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
