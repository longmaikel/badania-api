<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;

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
            ->leftJoin('test_test_category', 'tests.id', '=', 'test_test_category.test_id')
            ->groupBy('tests.id');

        return $builder;
    }
}
