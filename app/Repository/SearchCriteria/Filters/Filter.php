<?php

declare(strict_types=1);

namespace App\Repository\SearchCriteria\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    public function apply(Builder $query): Builder;
}
