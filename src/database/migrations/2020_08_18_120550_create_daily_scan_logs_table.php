<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyScanLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('daily_scan_logs', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('qr_code_id');
        //     $table->foreignId('household_detail_id');
        //     $table->foreignId('sub_zone_id');
        //     $table->foreignId('user_id'); //scanners id
        //     $table->double('lat', 20,4)->nullable();
        //     $table->double('lng', 20,4)->nullable();
        //     $table->float('accuracy', 20,4)->nullable();
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
        Schema::dropIfExists('daily_scan_logs');
    }
}
