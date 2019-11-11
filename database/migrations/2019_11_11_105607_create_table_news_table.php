<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatetableNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_news', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('cover_image_id')->default(0);
            $table->bigInteger('new_category_id')->default(0);
            $table->boolean('display')->default(true);
            $table->integer('order')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('sapo')->nullable();
            $table->text('content')->nullable();
            $table->string('auth')->nullable();
            $table->boolean('is_enabled')->default(true);

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('table_news', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_news');
    }
}
