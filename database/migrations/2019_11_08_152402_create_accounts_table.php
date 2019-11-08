<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreateaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Add some more columns

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('accounts', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
