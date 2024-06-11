<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name,
            'link' => $this->faker->url,
            'transaction_date' => $this->faker->date,
            'transaction_number' => Str::random(10),
            'paket_id' => 1,
            'qty' => $this->faker->numberBetween(1, 10),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'total_price' => $this->faker->randomFloat(2, 1000, 10000),
            'bayar' => $this->faker->randomFloat(2, 1000, 10000),
            'kembalian' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
