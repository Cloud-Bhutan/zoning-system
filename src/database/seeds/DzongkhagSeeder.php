<?php

use Illuminate\Database\Seeder;

class DzongkhagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Dzongkhag::create([
            'name' => 'Thimphu',
        ]);

        \App\Dzongkhag::create([
            'name' => 'Paro',
        ]);

        \App\Dzongkhag::create([
            'name' => 'Chukha',
        ]);

        \App\Dzongkhag::create([
            'name' => 'Samtse',
        ]);

        \App\Dzongkhag::create([
            'name' => 'Wangdue',
        ]);

        \App\Dzongkhag::create([
            'name' => 'Punakha',
        ]);
    }
}
