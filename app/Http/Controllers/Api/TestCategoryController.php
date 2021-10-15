<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestCategoryRequest;
use App\Http\Requests\UpdateTestCategoryRequest;
use App\Http\Resources\TestCategoryResource;
use App\Models\TestCategory;
use Illuminate\Http\JsonResponse;

class TestCategoryController extends Controller
{
    public function index(): TestCategoryResource
    {
        $categories = TestCategory::all();
        return new TestCategoryResource($categories);
    }

    public function store(StoreTestCategoryRequest $request): JsonResponse
    {
        $category = TestCategory::create($request->all());
        return response()->json(compact('category'), 201);
    }

    public function update(UpdateTestCategoryRequest $request, TestCategory $category): JsonResponse
    {
        dd($category);
        $category->update($request->all());
        return response()->json(compact('category'));
    }

    public function destroy(TestCategory $category): JsonResponse
    {
        $category->delete();
        return response()->json(['msg' => 'deleted']);
    }
}
