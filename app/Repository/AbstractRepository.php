<?php

namespace App\Repository;

use App\Repository\SearchCriteria\SearchCriteria;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements Repository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function applyCriteriaToQuery(Builder $query, SearchCriteria $searchCriteria): Builder
    {
        foreach ($searchCriteria->getCriteria() as $filter) {
            $filter->apply($query);
        }

        return $query;
    }

    abstract protected function getBaseQueryBuilder(): Builder;
}
