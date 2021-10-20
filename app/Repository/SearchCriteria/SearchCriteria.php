<?php

declare(strict_types=1);

namespace App\Repository\SearchCriteria;

use App\Repository\SearchCriteria\Filters\Filter;

class SearchCriteria
{

    private array $criteria;

    public function __construct()
    {
        $this->criteria = [];
    }

    /**
     * @return array|Filter[]
     */
    public function getCriteria(): array
    {
        return $this->criteria;
    }

    public function add(Filter $filter): SearchCriteria
    {
        $this->criteria[] = $filter;
        return $this;
    }

}
