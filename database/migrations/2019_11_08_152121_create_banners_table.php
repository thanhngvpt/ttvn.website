<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatebannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('admin_user_id')->default(0);
            $table->integer('order')->nullable();
            $table->boolean('is_enabled')->default(true);

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('banners', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
