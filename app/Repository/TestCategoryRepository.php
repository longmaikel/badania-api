<?php

namespace App\Repository;

use App\Models\TestCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TestCategoryRepository extends AbstractRepository
{

    public function __construct(TestCategory $model)
    {
        parent::__construct($model);
    }

    protected function getBaseQueryBuilder(): Builder
    {
        return $this->model->query();
    }
}
