<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('buildings', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->bigInteger('building_number')->unique();
        //     $table->string('lat');
        //     $table->string('lng');
        //     $table->integer('sub_zone_id');
        //     $table->string('status')->default("INCOMPLETE");
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
