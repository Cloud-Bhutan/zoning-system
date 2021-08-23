<?php

use Illuminate\Database\Seeder;

class DailylogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\DailyVisitLog::create([
            'household_detail_id' => '1',
            'shop_id' => '1',
            'scanned_by' => '1',
        ]);


        \App\DailyVisitLog::create([
            'household_detail_id' => '2',
            'shop_id' => '2',
            'scanned_by' => '2',
        ]);

        \App\DailyVisitLog::create([
            'household_detail_id' => '3',
            'shop_id' => '1',
            'scanned_by' => '1',
        ]);

        \App\DailyVisitLog::create([
            'household_detail_id' => '1',
            'shop_id' => '2',
            'scanned_by' => '2',
        ]);



    }
}
