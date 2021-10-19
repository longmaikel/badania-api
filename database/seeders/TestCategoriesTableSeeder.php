<?php

namespace Database\Seeders;

use App\Models\TestCategory;
use Illuminate\Database\Seeder;

class TestCategoriesTableSeeder extends Seeder
{
    private array $data = [
        ['id' => 1, 'name' => "Alergologia"],
        ['id' => 2, 'name' => "Anemia"],
        ['id' => 3, 'name' => "Autoimmunologia"],
        ['id' => 4, 'name' => "Badania kału"],
        ['id' => 5, 'name' => "Badania podstawowe i biochemiczne"],
        ['id' => 6, 'name' => "Badania z moczu"],
        ['id' => 7, 'name' => "Celiakia"],
        ['id' => 8, 'name' => "Choroby sercowo-naczyniowe"],
        ['id' => 9, 'name' => "Choroby tarczycy"],
        ['id' => 10, 'name' => "Choroby trzustki"]
    ];

    public function run(): void
    {
        foreach ($this->data as $entity) {
            TestCategory::firstOrCreate($entity);
        }
    }
}
