<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Test;

class AddTestService
{
    public function add(array $data): Test
    {
        return Test::create($data);
    }
}
