<?php
declare(strict_types=1);

namespace App\Logic\Distance;

final class DistanceConverter {

    /**
     * @param float $meters
     *
     * @return float
     */
    public static function metersToYards(float $meters): float {
        return (float)\bcmul('1.0936133', (string)$meters, 5);
    }

    /**
     * @param float $yards
     *
     * @return float
     */
    public static function yardsToMeters(float $yards): float {
        return (float)\bcmul('0.9144', (string)$yards, 5);
    }
}
