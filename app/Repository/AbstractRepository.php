<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\SearchCriteria\SearchCriteria;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements Repository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function findByCriteria(SearchCriteria $criteria): Collection
    {
        $builder = $this->getBaseQueryBuilder();
        return $this->applyCriteriaToQuery($builder, $criteria)
            ->get();
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
