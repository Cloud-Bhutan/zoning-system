<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyVisitLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_visit_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->foreignId('qr_code_id'); not required, since household_detail_id is mapped with qr_code_id
            $table->foreignId('shop_id');
            $table->foreignId('household_detail_id');
            $table->foreignId('user_id'); //scanners id
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
        Schema::dropIfExists('daily_visit_logs');
    }
}
