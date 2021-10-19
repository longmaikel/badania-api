<?php

namespace App\Service;

use App\Models\TestCategory;

class UpdateTestCategoryService
{
    public function update(TestCategory $test, array $data): bool
    {
        return $test->update($data);
    }
}
