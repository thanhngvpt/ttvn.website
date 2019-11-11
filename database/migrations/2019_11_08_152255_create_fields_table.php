<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatefieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->bigInteger('cover_image_id')->default(0);
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->bigInteger('icon1_image_id')->default(0);
            $table->string('charact_1')->nullable();
            $table->string('des_1')->nullable();
            $table->bigInteger('icon2_image_id')->default(0);
            $table->string('charact_2')->nullable();
            $table->string('des_2')->nullable();

            $table->bigInteger('icon3_image_id')->default(0);
            $table->string('charact_3')->nullable();
            $table->string('des_3')->nullable();

            $table->bigInteger('order')->nullable();
            $table->boolean('is_enabled')->default(true);
            
            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('fields', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
