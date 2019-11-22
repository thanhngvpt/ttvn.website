<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatejobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->integer('job_category_id')->default(0);
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('company_id')->default(0);
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->integer('number')->nullable();
            $table->integer('salary')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->integer('order')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_enabled')->default(true);

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('jobs', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
