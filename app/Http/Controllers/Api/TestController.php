<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestsResource;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(): TestsResource
    {
        $tests = Test::all();
        return new TestsResource($tests);
    }
}
