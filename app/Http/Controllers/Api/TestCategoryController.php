<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestCategoryRequest;
use App\Http\Requests\UpdateTestCategoryRequest;
use App\Http\Resources\TestCategoryResource;
use App\Models\TestCategory;
use App\Repository\TestCategoryRepository;
use App\Service\AddTestCategoryService;
use App\Service\UpdateTestCategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TestCategoryController extends Controller
{
    public function index(TestCategoryRepository $testCategoryRepository): TestCategoryResource
    {
        $categories = $testCategoryRepository->getAll();
        return new TestCategoryResource($categories);
    }

    public function store(StoreTestCategoryRequest $request, AddTestCategoryService $service): JsonResponse
    {
        $category = $service->add($request->all());
        return response()->json(compact('category'), Response::HTTP_CREATED);
    }

    public function update(
        UpdateTestCategoryRequest $request,
        TestCategory $testCategory,
        UpdateTestCategoryService $service
    ): JsonResponse
    {
        $success = $service->update($testCategory, $request->all());

        if (!$success) {
            return response()->json(
                ['msg' => 'Cannot update test category'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(compact('testCategory'));
    }

    public function destroy(TestCategory $testCategory): JsonResponse
    {
        $success = $testCategory->delete();

        if (!$success) {
            return response()->json(
                ['msg' => 'Cannot delete test category'],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(['msg' => 'Deleted correctly.']);
    }
}
