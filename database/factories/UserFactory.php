<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'username' => fake()->userName(),
            'nama_awal' => fake()->firstName(),
            'nama_akhir' => fake()->lastName(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'alamat' => fake()->address(),
            'telp' => fake()->phoneNumber(),
            'jabatan' => fake()->word(),
            'tgl_mulai_jabat' => fake()->date(),
            'foto' => 'null', // You might need a different method based on your requirements
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
