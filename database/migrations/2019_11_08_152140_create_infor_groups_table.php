<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateinforGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infor_groups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->bigInteger('thumbnail_image_id')->default(0);
            $table->text('description')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('infor_groups', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infor_groups');
    }
}
