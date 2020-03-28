<?php
declare(strict_types=1);

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DistanceController extends Controller {

    /**
     * POST /api/v1/distance/add
     * BODY
     * {
     *  "input": [
     *      {"meters": 5},
     *      {"yards": 3}
     *  ],
     *  "output": "meters"
     * }
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function add(Request $request): JsonResponse {
        $mock = [
            'meta' => [
                'status' => 'success',
                'version' => '1.0'
            ],
            'data' => [
                'meters' => 7.74
            ]
        ];

        return response()->json($mock);
    }
}
