<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateculturalCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultural_companies', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title_page')->nullable();
            $table->string('introduce')->nullable();
            $table->string('content')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description1')->nullable();
            $table->string('meta_description2')->nullable();
            $table->bigInteger('icon1_image_id')->default(0);
            $table->string('reason1')->nullable();
            $table->string('detail1')->nullable();
            $table->bigInteger('icon2_image_id')->default(0);
            $table->string('reason2')->nullable();
            $table->string('detail2')->nullable();

            $table->bigInteger('icon3_image_id')->default(0);
            $table->string('reason3')->nullable();
            $table->string('detail3')->nullable();

            $table->bigInteger('ttvn_image_id')->default(0);
            $table->string('ttvn_title')->nullable();
            $table->string('ttvn_content')->nullable();
            $table->string('we_find_introduce')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('cultural_companies', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultural_companies');
    }
}
