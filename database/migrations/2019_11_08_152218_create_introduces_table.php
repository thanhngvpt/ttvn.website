<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateintroducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduces', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title_introduce')->nullable();
            $table->string('title_leader_ship')->nullable();
            $table->bigInteger('content_image_id')->default(0);
            $table->bigInteger('mission_image_id')->default(0);
            $table->string('content')->nullable();
            $table->string('mission')->nullable();
            $table->string('content_intro')->nullable();
            $table->string('overview_intro')->nullable();
            $table->bigInteger('diagram_image_id')->default(0);

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('introduces', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('introduces');
    }
}
