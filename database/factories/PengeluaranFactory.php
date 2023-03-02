<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengeluaran>
 */
class PengeluaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $input = ['Aksesoris', 'Case', 'Saldo', 'Kabel'];
        $random = array_rand($input);

        $slug = $this->faker->unique()->sentence(mt_rand(1, 3));

        return [
            'user_id' => mt_rand(10, 11),
            'nama' => $this->faker->unique()->sentence(mt_rand(1, 2)),
            'slug' => strtolower(str_replace(" ", "-", $slug)),
            'harga' => $this->faker->randomNumber(5, true),
            'jumlah' => $this->faker->randomNumber(2, true),
            'total' => $this->faker->randomNumber(5, true),
            'keterangan' => $input[$random],
        ];
    }
}
