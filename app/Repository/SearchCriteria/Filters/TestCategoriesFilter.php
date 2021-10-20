<?php

declare(strict_types=1);

namespace App\Repository\SearchCriteria\Filters;

use Illuminate\Database\Eloquent\Builder;

class TestCategoriesFilter implements Filter
{

    private array $categories;

    public function __construct(array $categories)
    {
        $this->categories = $categories;
    }

    public function apply(Builder $query): Builder
    {
        $query->whereIn('test_test_category.test_category_id', $this->categories);
        return $query;
    }
}
