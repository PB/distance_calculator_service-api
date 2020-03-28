<?php
declare(strict_types=1);

namespace App\Logic\Distance;

class DistanceManager {
    /**
     * @var DistanceValidator
     */
    private $validator;

    /**
     * DistanceManager constructor.
     *
     * @param DistanceValidator $validator
     */
    public function __construct(DistanceValidator $validator) {
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @param int $precision
     *
     * @return array
     */
    public function add(array $data, $precision = 2): array {
        $data = \array_change_key_case($data, CASE_LOWER);
        // validate data
        $this->validator->setData($data)->isValid();
        // sum all in meters
        $meters = $this->sumMeters($data);
        // return in the desired unit
        $result = $data['output'] === 'meters' ? $meters : DistanceConverter::metersToYards($meters);

        return [$data['output'] => \round($result, $precision)];
    }

    /**
     * @param $data
     *
     * @return float
     */
    private function sumMeters($data):float {
        $total = 0.0;
        foreach ($data['input'] as $value) {
            $unit = \strtolower(\key($value));
            $number = \reset($value);
            $total += ($unit === 'yards' ? DistanceConverter::yardsToMeters($number) : $number);
        }

        return (float)$total;
    }
}
