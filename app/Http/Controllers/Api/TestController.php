<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Http\Resources\TestResource;
use App\Models\Test;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function index(): TestResource
    {
        $tests = Test::all();
        return new TestResource($tests);
    }

    public function store(StoreTestRequest $request): JsonResponse
    {
        $test = Test::create($request->all());
        return response()->json(compact('test'), 201);
    }

    public function update(UpdateTestRequest $request, Test $test): JsonResponse
    {
        $test->update($request->all());
        return response()->json(compact('test'));
    }

    public function destroy(Test $test): JsonResponse
    {
        $test->delete();
        return response()->json(['msg' => 'deleted']);
    }
}
