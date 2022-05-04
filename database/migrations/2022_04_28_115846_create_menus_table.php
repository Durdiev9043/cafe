<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            //name, count, olchov birlik, summasi
            $table->id();
            $table->unsignedBigInteger('cafe_id');
            $table->string('name');
            $table->string('count');
            $table->string('oneness');
            $table->string('summ');
            $table->string('img');
            $table->timestamps();

            $table->foreign('cafe_id')->references('id')->on('cafes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
