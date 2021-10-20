<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Test;

class UpdateTestService
{
    public function update(Test $test, array $data): bool
    {
        return $test->update($data);
    }
}
