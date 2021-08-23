<?php

use Illuminate\Database\Seeder;

class QRCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\QrCode::create([
            'qr_number' => '1',
            'status' => 'Active'
        ]);

        \App\QrCode::create([
            'qr_number' => '2',
            'status' => 'Active'
        ]);

        \App\QrCode::create([
            'qr_number' => '3',
            'status' => 'Active'
        ]);

    }
}
