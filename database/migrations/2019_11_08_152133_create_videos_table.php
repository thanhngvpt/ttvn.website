<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatevideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('video_url')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('videos', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
