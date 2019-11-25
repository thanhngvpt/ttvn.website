<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateupdateTableCulturalCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cultural_companies', function (Blueprint $table) {
            $table->bigInteger('cover_image_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('update_table_cultural_companies');
    }
}
