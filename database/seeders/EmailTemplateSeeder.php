<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailTemplate::insert([
            [
                'name' => 'Valentine',
                'content' => 'Valentine Time',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Halloween',
                'content' => 'Trick or Treat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black Friday',
                'content' => 'Black Friday discount',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
