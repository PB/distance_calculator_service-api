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

    public function add($data) {
        $this->validator->setData($data)->isValid();
    }

}
