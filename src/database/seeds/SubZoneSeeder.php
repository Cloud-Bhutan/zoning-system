<?php

use Illuminate\Database\Seeder;

class SubZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\SubZone::create([
            'name' => 'A',
            'zone_id' => '1',
            ]);
            \App\SubZone::create([
            'name' => 'B',
            'zone_id' => '3',
            ]);
            \App\SubZone::create([
            'name' => 'C',
            'zone_id' => '2',
            ]);
    
            \App\SubZone::create([
            'name' => 'A',
            'zone_id' => '2',
            ]);
    
            \App\SubZone::create([
            'name' => 'B',
            'zone_id' => '1',
            ]);
    
            \App\SubZone::create([
            'name' => 'C',
            'zone_id' => '4',
            ]);
    }
}
