<?php

namespace App\Service;

use App\Models\TestCategory;

class AddTestCategoryService
{
    public function add(array $data): TestCategory
    {
        return TestCategory::create($data);
    }
}
