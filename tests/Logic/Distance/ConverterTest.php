<?php
declare(strict_types=1);

namespace App\Tests\Logic\Distance;

use App\Logic\Distance\DistanceConverter;
use TestCase;

class ConverterTest extends TestCase {

    public function testYardsToMeters(): void {
        $this->assertEquals(0.91440, DistanceConverter::yardsToMeters(1));
        $this->assertEquals(0.091440, DistanceConverter::yardsToMeters(0.1));
        $this->assertEquals(213.96960, DistanceConverter::yardsToMeters(234));
        $this->assertEquals(91.11996, DistanceConverter::yardsToMeters(99.65));
        $this->assertEquals(10.97280, DistanceConverter::yardsToMeters(12.00));
    }

    public function testMetersToYards(): void {
        $this->assertEquals(1.09361, DistanceConverter::metersToYards(1));
        $this->assertEquals(0.10936, DistanceConverter::metersToYards(0.1));
        $this->assertEquals(255.90551, DistanceConverter::metersToYards(234));
        $this->assertEquals(108.97856, DistanceConverter::metersToYards(99.65));
        $this->assertEquals(13.12335, DistanceConverter::metersToYards(12.00));
    }
}
