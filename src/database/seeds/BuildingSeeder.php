<?php

use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Building::create([
            'building_number' => '1',
            'status' => 'incomplete',
            'sub_zone_id' => '1'
        ]);
        \App\Building::create([
            'building_number' => '2',
            'status' => 'incomplete',
            'sub_zone_id' => '2'
        ]);
        \App\Building::create([
            'building_number' => '3',
            'status' => 'incomplete',
            'sub_zone_id' => '3'
        ]);
        \App\Building::create([
            'building_number' => '4',
            'status' => 'incomplete',
            'sub_zone_id' => '4'
        ]);
    }
}
