<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = [
            [
                'paket_name' => 'Paket 1 Jam',
                'price' => 100000,
            ],
            [
                'paket_name' => 'Paket 2 Jam',
                'price' => 200000,
            ],
            [
                'paket_name' => 'Paket 3 Jam',
                'price' => 300000,
            ]
        ];

        foreach ($paket as $paket) {
            Paket::create($paket);
        }
    }
}

