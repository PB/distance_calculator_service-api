<?php
declare(strict_types=1);

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Response\Api\V1\ResponseDTO;
use App\Logic\Distance\DistanceManager;
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
     * @param Request         $request
     * @param DistanceManager $distanceManager
     *
     * @return JsonResponse
     */
    public function add(Request $request, DistanceManager $distanceManager): JsonResponse {
        try {
            $distanceManager->add($request->all());
        } catch (\InvalidArgumentException $iae) {
            return (new JsonResponse((new ResponseDTO([], false, $iae->getMessage())), JsonResponse::HTTP_BAD_REQUEST));
        } catch (\Throwable $t){
            return (new JsonResponse((new ResponseDTO([], false, 'Invalid data')), JsonResponse::HTTP_BAD_REQUEST));
        }

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
