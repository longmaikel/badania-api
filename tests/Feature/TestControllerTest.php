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
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => $this->singleTestModelFieldsStructure
                ]
            ]);
    }

    public function test_creating_test(): void
    {
        $data = ['name' => 'example test', 'price' => '230.99'];

        $this->json('post', 'api/tests', $data)
            ->assertCreated()
            ->assertJsonStructure(['test' => $this->singleTestModelFieldsStructure]);
        $this->assertDatabaseHas('tests', $data);

    }

    /**
     * @dataProvider incompleteParamsCreateUpdateTestRequestDataProvider
     */
    public function test_creating_test_with_no_each_required_params(array $data): void
    {
        $this->json('post', 'api/tests', $data)
            ->assertUnprocessable();
    }

    public function test_updating_test(): void
    {
        $data = ['name' => 'example test', 'price' => '230.99'];
        $test = Test::create($data);

        $updateData = ['name' => 'example test edit', 'price' => '255.99'];

        $url = sprintf('api/tests/%s', $test->id);

        $this->json('put', $url, $updateData)
            ->assertOk()
            ->assertJsonStructure(['test' => $this->singleTestModelFieldsStructure]);
        $this->assertDatabaseHas('tests', array_merge(['id' => $test->id], $updateData));

    }

    /**
     * @dataProvider incompleteParamsCreateUpdateTestRequestDataProvider
     */
    public function test_updating_test_with_no_each_required_params(array $incompleteData): void
    {
        $test = Test::create(['name' => 'update test', 'price' => '255.99']);
        $url = sprintf('api/tests/%s', $test->id);

        $this->json('put', $url, $incompleteData)
            ->assertUnprocessable();

    }

    public function test_deleting_test(): void
    {
        $data = ['name' => 'example test', 'price' => '230.99'];
        $test = Test::create($data);

        $url = sprintf('api/tests/%s', $test->id);

        $expectedDecodedJson = ["msg" => "Deleted correctly."];

        $this->json('delete', $url)
            ->assertJson($expectedDecodedJson)
            ->assertOk();
    }

    public function incompleteParamsCreateUpdateTestRequestDataProvider(): array
    {
        return [
            [['name' => 'example test']],
            [['price' => '230.99']]
        ];
    }
}
