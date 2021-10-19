<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetTestRequest;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestResource;
use App\Models\Test;
use App\Repository\SearchCriteria\Filters\TestCategoriesFilter;
use App\Repository\SearchCriteria\SearchCriteria;
use App\Repository\TestRepository;
use App\Service\AddTestService;
use App\Service\UpdateTestService;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function index(
        GetTestRequest $request,
        TestRepository $testRepository,
        SearchCriteria $searchCriteria
    ): TestResource
    {
        $searchCriteria->add(new TestCategoriesFilter($request->getCategories()));
        $tests = $testRepository->findByCriteria($searchCriteria);
        return new TestResource($tests);
    }

    public function store(StoreTestRequest $request, AddTestService $service): JsonResponse
    {
        $test = $service->add($request->all());
        return response()->json(compact('test'), 201);
    }

    public function update(UpdateTestRequest $request, Test $test, UpdateTestService $service): JsonResponse
    {
        $success = $service->update($test, $request->all());

        if (!$success) {
            return response()->json(['msg' => 'Cannot update test'], 422);
        }

        return response()->json(compact('test'));
    }

    public function destroy(Test $test): JsonResponse
    {
        $success = $test->delete();

        if (!$success) {
            return response()->json(['msg' => 'Cannot delete test'], 422);
        }

        return response()->json(['msg' => 'Deleted correctly.']);
    }
}
