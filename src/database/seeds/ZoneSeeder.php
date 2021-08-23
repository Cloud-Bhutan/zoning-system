<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->disableForeignKeys();
       \App\Zone::create([
            'name' => 'Babesa Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'red',
        ]);

        \App\Zone::create([
            'name' => 'Olakha Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'white',
        ]);

        \App\Zone::create([
            'name' => 'Changjiji Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'blue',
        ]);
        
        \App\Zone::create([
            'name' => 'Mothithang Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'green',
        ]);
        \App\Zone::create([
            'name' => 'Taba Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'black',
        ]);
        \App\Zone::create([
            'name' => 'Babesa Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'purple',
        ]);
        \App\Zone::create([
            'name' => 'Town Zone',
            'dzongkhag_id' => '1',
            'color_code' => 'yello',
        ]);
    }
}
