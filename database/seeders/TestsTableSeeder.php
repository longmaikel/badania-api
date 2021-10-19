<?php

namespace Database\Seeders;


use App\Models\Test;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{

    private array $data = [
        ['id' => 1, 'name' => 'SARS-CoV-2 (COVID-19) met. Real Time RT-PCR', 'price' => 324.00],
        ['id' => 2, 'name' => 'Mocz - badanie ogólne', 'price' => 45.99],
        ['id' => 3, 'name' => 'Morfologia krwi', 'price' => 100.00],
        ['id' => 4, 'name' => 'PT (INR)', 'price' => 234.90],
        ['id' => 5, 'name' => 'APTT', 'price' => 1000.00],
        ['id' => 6, 'name' => 'Glukoza', 'price' => 30.00],
        ['id' => 7, 'name' => 'Lipidogram (CHOL, HDL, nie-HDL, LDL, TG)', 'price' => 230.50],
        ['id' => 8, 'name' => 'Próby wątrobowe (ALT, AST, ALP, BIL, GGTP)', 'price' => 230.50],
        ['id' => 9, 'name' => 'Kreatynina', 'price' => 100.00],
        ['id' => 10, 'name' => 'Wapń całkowity', 'price' => 50.00],
        ['id' => 11, 'name' => 'Żelazo', 'price' => 100.00],
        ['id' => 12, 'name' => 'Ferrytyna', 'price' => 100.00],
        ['id' => 13, 'name' => 'CRP, ilościowo', 'price' => 70.00],
        ['id' => 14, 'name' => 'OB', 'price' => 40.00],
        ['id' => 15, 'name' => 'Grupa krwi', 'price' => 60.00]
    ];

    public function run(): void
    {
        foreach ($this->data as $entity) {
            Test::firstOrCreate($entity);
        }
    }
}
