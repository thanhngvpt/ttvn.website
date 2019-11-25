<?php

use Illuminate\Database\Schema\Blueprint;
use \App\Database\Migration;

class CreatefootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('hn_name')->nullable();
            $table->string('hn_address')->nullable();
            $table->string('hn_phone')->nullable();
            $table->string('hn_fax')->nullable();

            $table->string('other_name')->nullable();
            $table->string('other_address')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('other_fax')->nullable();

            $table->string('fb_link')->nullable();
            $table->string('skype_link')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
        });

        $this->updateTimestampDefaultValue('footers', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
}
