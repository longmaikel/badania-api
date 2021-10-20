<?php

namespace Tests\Unit;

use App\Repository\SearchCriteria\Filters\Filter;
use App\Repository\SearchCriteria\SearchCriteria;
use Mockery;
use PHPUnit\Framework\TestCase;

class SearchCriteriaTest extends TestCase
{
    private SearchCriteria $searchCriteria;

    protected function setUp(): void
    {
        parent::setUp();
        $this->searchCriteria = new SearchCriteria();
    }

    public function test_search_criteria_object_is_empty_after_init(): void
    {
        $this->assertSame([], $this->searchCriteria->getCriteria());
    }

    public function test_adding_search_criteria_object(): void
    {
        $filter = Mockery::mock(Filter::class);
        $this->searchCriteria->add($filter);
        $this->assertSame([$filter], $this->searchCriteria->getCriteria());
    }

    public function test_adding_more_search_criteria_object(): void
    {
        $filter1 = Mockery::mock(Filter::class);
        $filter2 = Mockery::mock(Filter::class);

        $this->searchCriteria->add($filter1)
            ->add($filter2);

        $this->assertSame([$filter1, $filter2], $this->searchCriteria->getCriteria());
    }

}
