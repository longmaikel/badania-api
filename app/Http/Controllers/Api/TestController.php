<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Http\Resources\TestsResource;
use App\Models\Test;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function index(): TestsResource
    {
        $tests = Test::all();
        return new TestsResource($tests);
    }

    public function store(StoreTestRequest $request): JsonResponse
    {
        $test = Test::create($request->all());
        return response()->json(compact('test'), 201);
    }
}
