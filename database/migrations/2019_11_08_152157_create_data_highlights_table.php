<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatedataHighlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_highlights', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('title')->nullable();
            $table->bigInteger('data')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('data_highlights', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_highlights');
    }
}
