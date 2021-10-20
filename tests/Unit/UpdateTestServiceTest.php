<?php

namespace Tests\Unit;

use App\Models\Test;
use App\Service\UpdateTestService;
use Mockery;
use PHPUnit\Framework\TestCase;

class UpdateTestServiceTest extends TestCase
{

    private UpdateTestService $service;

    public function test_successful_test_updating(): void
    {
        $test = Mockery::mock(Test::class);
        $test->shouldReceive('update')
            ->andReturn(true)
            ->once();

        $response = $this->service->update($test, []);

        $this->assertTrue($response);

    }

    public function test_failed_test_updating(): void
    {
        $test = Mockery::mock(Test::class);
        $test->shouldReceive('update')
            ->andReturn(false)
            ->once();

        $response = $this->service->update($test, []);

        $this->assertFalse($response);

    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new UpdateTestService();
    }

}
