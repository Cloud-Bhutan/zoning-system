<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseholdDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile_no');
            $table->string('name')->nullable();
            $table->string('cid')->nullable();
            $table->integer('total_female')->nullable();
            $table->integer('total_male')->nullable();
            $table->integer('total_above_60')->nullable();
            $table->integer('total_below_10')->nullable();
            $table->string('emergency_contact_no')->nullable();
            $table->string('nationality')->nullable();
            $table->foreignId('qr_code_id');
            $table->integer('building_id');
            $table->unsignedBigInteger('user_id'); //user_id of registering person
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('household_details');
    }
}
