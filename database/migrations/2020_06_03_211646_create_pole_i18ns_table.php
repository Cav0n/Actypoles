<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoleI18nsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pole_i18ns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pole_id')->unsigned();
            $table->string('lang')->default('FR');
            $table->string('title');
            $table->text('description');

            $table->timestamps();

            $table->foreign('pole_id')->references('id')->on('poles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pole_i18ns');
    }
}
