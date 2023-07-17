<?php
namespace Database\Seeders;
use App\Models\CarModel;
use Illuminate\Database\Seeder;
use App\Models\Car;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            // Toyota
            ['name' => 'Corolla', 'manufacturer_id' => 1],
            ['name' => 'Camry', 'manufacturer_id' => 1],
            ['name' => 'RAV4', 'manufacturer_id' => 1],
            ['name' => 'Prius', 'manufacturer_id' => 1],

            // Volkswagen
            ['name' => 'Golf', 'manufacturer_id' => 2],
            ['name' => 'Passat', 'manufacturer_id' => 2],
            ['name' => 'Tiguan', 'manufacturer_id' => 2],
            ['name' => 'Polo', 'manufacturer_id' => 2],

            // BMW
            ['name' => '3 Series', 'manufacturer_id' => 3],
            ['name' => '5 Series', 'manufacturer_id' => 3],
            ['name' => 'X5', 'manufacturer_id' => 3],
            ['name' => 'i8', 'manufacturer_id' => 3],

            // Ford
            ['name' => 'Focus', 'manufacturer_id' => 4],
            ['name' => 'Fiesta', 'manufacturer_id' => 4],
            ['name' => 'Mustang', 'manufacturer_id' => 4],
            ['name' => 'Escape', 'manufacturer_id' => 4],

            // Honda
            ['name' => 'Civic', 'manufacturer_id' => 5],
            ['name' => 'Accord', 'manufacturer_id' => 5],
            ['name' => 'CR-V', 'manufacturer_id' => 5],
            ['name' => 'Pilot', 'manufacturer_id' => 5],

            // Audi
            ['name' => 'A3', 'manufacturer_id' => 6],
            ['name' => 'A4', 'manufacturer_id' => 6],
            ['name' => 'Q5', 'manufacturer_id' => 6],
            ['name' => 'R8', 'manufacturer_id' => 6],

            // Nissan
            ['name' => 'Altima', 'manufacturer_id' => 7],
            ['name' => 'Maxima', 'manufacturer_id' => 7],
            ['name' => 'Rogue', 'manufacturer_id' => 7],
            ['name' => 'GT-R', 'manufacturer_id' => 7],

            // Tesla
            ['name' => 'Model 3', 'manufacturer_id' => 8],
            ['name' => 'Model S', 'manufacturer_id' => 8],
            ['name' => 'Model X', 'manufacturer_id' => 8],
            ['name' => 'Model Y', 'manufacturer_id' => 8],

            // Mercedes-Benz
            ['name' => 'C-Class', 'manufacturer_id' => 9],
            ['name' => 'E-Class', 'manufacturer_id' => 9],
            ['name' => 'GLC', 'manufacturer_id' => 9],
            ['name' => 'S-Class', 'manufacturer_id' => 9],

            // Chevrolet
            ['name' => 'Camaro', 'manufacturer_id' => 10],
            ['name' => 'Malibu', 'manufacturer_id' => 10],
            ['name' => 'Silverado', 'manufacturer_id' => 10],
            ['name' => 'Equinox', 'manufacturer_id' => 10],
        ];


        foreach ($models as $model) {
            CarModel::create($model);
        }
    }
}

