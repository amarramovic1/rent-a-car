<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manufacturer;
class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manufacturers = [
            ['name' => 'Toyota'],
            ['name' => 'Volkswagen'],
            ['name' => 'BMW'],
            ['name' => 'Ford'],
            ['name' => 'Honda'],
            ['name' => 'Audi'],
            ['name' => 'Nissan'],
            ['name' => 'Tesla'],
            ['name' => 'Mercedes-Benz'],
            ['name' => 'Chevrolet'],

        ];

        Manufacturer::insert($manufacturers);
    }
    }

