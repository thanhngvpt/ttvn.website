<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('link')->nullable();
            $table->integer('order')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('projects', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
