<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $faker = Faker::create();
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('user_emails')->insert([
        //         'nama' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'no_telepon' => $faker->phoneNumber,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        //call userseeder
        $this->call(UserSeeder::class);

    }
}
