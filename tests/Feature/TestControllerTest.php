<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class TestControllerTest extends TestCase
{

    public function test_index_return_valid_json(): void
    {
        $this->json('get', 'api/tests')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        "id",
                        "name",
                        "price",
                        "created_at",
                        "updated_at"
                    ]
                ]
            ]);
    }
}
