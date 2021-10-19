<?php

namespace App\Repository;

use App\Models\Test;
use App\Repository\SearchCriteria\SearchCriteria;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TestRepository extends AbstractRepository
{

    public function __construct(Test $model)
    {
        parent::__construct($model);
    }

    protected function getBaseQueryBuilder(): Builder
    {
        $builder = $this->model->query();
        $builder->select('tests.*')
            ->leftJoin('test_test_category','tests.id', '=', 'test_test_category.test_id')
            ->groupBy('tests.id');

        return $builder;
    }
}
