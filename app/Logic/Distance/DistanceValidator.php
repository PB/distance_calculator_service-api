<?php
declare(strict_types=1);

namespace App\Logic\Distance;

class DistanceValidator {
    private const REQUIRED_FIELDS = ['input', 'output'];
    private const VALID_UNITS = ['meters', 'yards'];
    /**
     * @var array
     */
    private $data;

    /**
     * @return bool
     */
    public function isValid(): bool {
        if (!$this->isValidInputStructure()) {
            throw new \InvalidArgumentException('Invalid payload structure. Missing: ' . \implode(', ', self::REQUIRED_FIELDS));
        }
        if (!$this->isValidInputData()) {
            throw new \InvalidArgumentException('Invalid input data. Valid: ' . implode(', ', self::VALID_UNITS));
        }
        if (!$this->isValidOutputData()) {
            throw new \InvalidArgumentException('Invalid output data. Valid: ' . implode(', ', self::VALID_UNITS));
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isValidInputStructure(): bool {
        return !\array_diff_key(\array_flip(self::REQUIRED_FIELDS), $this->data);
    }

    /**
     * @return bool
     */
    private function isValidInputData(): bool {
        foreach ($this->data['input'] as $value) {
            $unit = \key($value);
            $number = \reset($value);
            // check if key and value are correct
            if (!\is_numeric($number) || !\in_array(strtolower($unit), self::VALID_UNITS, true)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isValidOutputData(): bool {
        return \in_array(\strtolower($this->data['output']), self::VALID_UNITS, true);
    }

    /**
     * @param array $data
     *
     * @return DistanceValidator
     */
    public function setData(array $data): DistanceValidator {
        // change keys to lower
        $this->data = \array_change_key_case($data, CASE_LOWER);

        return $this;
    }
}
