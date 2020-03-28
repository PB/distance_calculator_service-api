<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Http\Response\Api\V1\ResponseDTO;
use Closure;
use Illuminate\Http\JsonResponse;

class JSONRequestMiddleware {
    /**
     * Handle an incoming request.
     * Allow only Content-Type: application/json
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!$request->isJson()) {
            return (new JsonResponse((new ResponseDTO([], false, 'Only JSON Payload')), JsonResponse::HTTP_NOT_ACCEPTABLE));
        }

        return $next($request);
    }
}
