<?php

use Illuminate\Database\Seeder;

class AllvisitlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AllVisitLog::create([
            'qr_code_id' => '1',
            'shop_id' => '1',
            'household_detail_id' => '1',
            'scanned_by' => '1',
        ]);


    }
}
