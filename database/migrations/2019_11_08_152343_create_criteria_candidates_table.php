<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatecriteriaCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_candidates', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('icon_image_id')->default(0);
            $table->string('name')->nullable();
            $table->string('content')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('criteria_candidates', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria_candidates');
    }
}
