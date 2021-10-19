<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestTestCategoryTableSeeder extends Seeder
{

    private array $data = [
        ['test_id' => 1, 'categories' => [1,6,9,4]],
        ['test_id' => 2, 'categories' => [1]],
        ['test_id' => 3, 'categories' => [2,6]],
        ['test_id' => 4, 'categories' => [8]],
        ['test_id' => 5, 'categories' => [5,1]],
        ['test_id' => 6, 'categories' => [3,4,5]],
        ['test_id' => 7, 'categories' => [2,7]],
        ['test_id' => 8, 'categories' => [3,8]],
        ['test_id' => 9, 'categories' => [2,3,6,9]],
        ['test_id' => 10, 'categories' => [6]],
        ['test_id' => 11, 'categories' => [8]],
        ['test_id' => 12, 'categories' => []],
        ['test_id' => 13, 'categories' => [1]],
        ['test_id' => 14, 'categories' => [4,2]],
        ['test_id' => 15, 'categories' => []]
    ];

    public function run(): void
    {
        foreach ($this->data as $data) {
            $testId = $data['test_id'];
            $categories = $data['categories'];
            Test::find($testId)
                ->testCategories()
                ->sync($categories);
        }
    }
}
