<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\SearchCriteria\SearchCriteria;
use Illuminate\Database\Eloquent\Collection;

interface Repository
{
    public function getAll(): Collection;

    public function findByCriteria(SearchCriteria $criteria): Collection;
}
