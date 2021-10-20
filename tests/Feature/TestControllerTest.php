<?php

namespace Tests\Feature;

use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class TestControllerTest extends TestCase
{

    /**
     * @var string[]
     */
    private array $singleTestModelFieldsStructure;

    protected function setUp(): void
    {
        parent::setUp();
        $this->singleTestModelFieldsStructure = [
            "id",
            "name",
            "price",
            "created_at",
            "updated_at"
        ];
    }

    public function test_index_return_valid_json(): void
    {
        $this->json('get', 'api/tests')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->singleTestModelFieldsStructure
                ]
            ]);
    }

    public function test_creating_test(): void
    {
        $data = ['name' => 'example test', 'price' => '230.99'];
        $test = Test::create($data);

        $this->json('post', 'api/tests', $data)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(['test' => $this->singleTestModelFieldsStructure]);
        $this->assertDatabaseHas('tests',$data);

    }

    /**
     * @dataProvider incompleteParamsCreateTestRequestDataProvider
     */
    public function test_creating_test_with_no_each_required_params(array $data): void
    {
        $this->json('post', 'api/tests', $data)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function incompleteParamsCreateTestRequestDataProvider(): array
    {
        return [
            [['name' => 'example test']],
            [['price' => '230.99']]
        ];
    }
}
