<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aksesoris>
 */
class AksesorisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $input = ['earphone', 'charger', 'kabel', 'pulsa', 'paket'];
        $random = array_rand($input);

        return [
            'user_id' => mt_rand(10, 11),
            'nama' => $this->faker->sentence(mt_rand(1, 2)),
            'merk' => $this->faker->sentence(mt_rand(1, 2)),
            'kategori' => $input[$random],
            'harga_asli' => $this->faker->randomNumber(5, true),
            'harga_jual' => $this->faker->randomNumber(5, true),
        ];
    }
}
