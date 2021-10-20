<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\TestCategory;
use Illuminate\Database\Eloquent\Builder;

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
