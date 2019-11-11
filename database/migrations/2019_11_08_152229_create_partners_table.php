<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatepartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cover_image_id')->default(0);
            $table->string('name')->nullable();
            $table->string('link')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('partners', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
