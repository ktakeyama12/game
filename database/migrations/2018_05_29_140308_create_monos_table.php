<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('mono');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mono');
    }
}
