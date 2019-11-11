<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatesaveValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('value')->nullable();
            $table->string('content')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('save_values', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('save_values');
    }
}
