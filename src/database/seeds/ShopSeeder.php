<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Shop::create([
            'name' => 'Babesa shop',
            'mobile_no' => '17201900',
            'address' => 'Babesa',
            'description' => 'babesa shop in babesa',
            'sub_zone_id' => '1',
            ]);

        \App\Shop::create([
            'name' => 'Babesa Grocery shop',
            'mobile_no' => '17212333',
            'address' => 'Babesa',
            'description' => 'babesa Grocery in babesa',
            'sub_zone_id' => '1',
            ]);

            \App\Shop::create([
                'name' => 'Olakha shop',
                'mobile_no' => '17205909',
                'address' => 'Olakha',
                'description' => 'Olakha shop in babesa',
                'sub_zone_id' => '1',
                ]);

        \App\Shop::create([
            'name' => 'Olakha shop',
            'mobile_no' => '17205909',
            'address' => 'Olakha',
            'description' => 'Olakha shop in babesa',
            'sub_zone_id' => '1',
            ]);
    }
}
