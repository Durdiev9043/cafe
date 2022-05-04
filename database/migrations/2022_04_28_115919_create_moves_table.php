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
        Schema::create('moves', function (Blueprint $table) {
            //cafe_id, lattitude, longitude, move_name, from_date, to_date
            $table->id();
            $table->unsignedBigInteger('cafe_id');
            $table->float('lattitude');
            $table->float('longitude');
            $table->string('move_name');
            $table->date('from_date');
            $table->date('to_date');
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
        Schema::dropIfExists('moves');
    }
};
