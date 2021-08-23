<?php

use Illuminate\Database\Seeder;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\HouseholdDetail::create([
            'name' => 'Tshering Nidup',
            'mobile_no' => '7712398',
            'no_of_heads' => '4',
            'qr_code_id' => '1',
            'user_id'=>1,
            'building_id'=>1
            
        ]);

        \App\HouseholdDetail::create([
            'name' => 'Yeshi Dorji',
            'mobile_no' => '1777777',
            'no_of_heads' => '6',
            'qr_code_id' => '2',
            'user_id'=>1,
            'building_id'=>2
        ]);

        \App\HouseholdDetail::create([
            'name' => 'Poojan Sharma',
            'mobile_no' => '1752742',
            'no_of_heads' => '5',
            'qr_code_id' => '3',
            'user_id'=>1,
            'building_id'=>3
        ]);
    }
}
