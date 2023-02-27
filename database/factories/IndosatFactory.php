<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indosat>
 */
class IndosatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $input = ['Pulsa', 'Paket Internet', 'Paket Telefon'];
        $random = array_rand($input);

        $slug = $this->faker->unique()->sentence(mt_rand(1, 3));

        return [
            'user_id' => mt_rand(10, 11),
            'nama' => $this->faker->unique()->sentence(mt_rand(1, 2)),
            'slug' => strtolower(str_replace(" ", "-", $slug)),
            'masa_aktif' => $this->faker->sentence(mt_rand(1, 1)),
            'kategori' => $input[$random],
            'harga_asli' => $this->faker->randomNumber(5, true),
            'harga_jual' => $this->faker->randomNumber(5, true),
        ];
    }
}
