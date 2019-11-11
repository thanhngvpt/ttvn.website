<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateheadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title_heading')->nullable();
            $table->text('heading_description')->nullable();
            $table->string('title_group')->nullable();
            $table->string('title_data_highlight')->nullable();
            $table->string('title_news')->nullable();
            $table->string('title_company')->nullable();
            $table->string('title_support')->nullable();
            $table->string('support_description')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('headings', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('headings');
    }
}
