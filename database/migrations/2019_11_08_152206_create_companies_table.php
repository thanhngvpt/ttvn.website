<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatecompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->bigInteger('cover_image_id')->default(0);
            $table->string('link')->nullable();
            $table->boolean('is_enabled')->default(true);
            
            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('companies', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
