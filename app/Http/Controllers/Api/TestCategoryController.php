<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestCategoryRequest;
use App\Http\Requests\UpdateTestCategoryRequest;
use App\Http\Resources\TestCategoryResource;
use App\Models\TestCategory;
use App\Repository\TestCategoryRepository;
use Illuminate\Http\JsonResponse;

class TestCategoryController extends Controller
{
    public function index(TestCategoryRepository $testCategoryRepository): TestCategoryResource
    {
        $categories = $testCategoryRepository->getAll();
        return new TestCategoryResource($categories);
    }

    public function store(StoreTestCategoryRequest $request): JsonResponse
    {
        $category = TestCategory::create($request->all());
        return response()->json(compact('category'), 201);
    }

    public function update(UpdateTestCategoryRequest $request, TestCategory $testCategory): JsonResponse
    {
        $success = $testCategory->update($request->all());
        if (!$success) {
            return response()->json(['msg' => 'Cannot update test category'], 422);
        }
        return response()->json(compact('testCategory'));
    }

    public function destroy(TestCategory $testCategory): JsonResponse
    {
        $success = $testCategory->delete();
        if (!$success) {
            return response()->json(['msg' => 'Cannot delete test category'], 422);
        }
        return response()->json(['msg' => 'Deleted correctly.']);
    }
}
