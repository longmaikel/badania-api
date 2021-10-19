<?php

namespace App\Service;

use App\Models\Test;

class AddTestService
{
    public function add(array $data): Test
    {
        return Test::create($data);
    }
}
