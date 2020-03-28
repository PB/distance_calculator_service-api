<?php
declare(strict_types=1);

namespace App\Tests\Controller\API\V1;

use TestCase;

class DistanceTest extends TestCase {

    /**
     * Test meters + yards, output: meters
     */
    public function testAdd(): void {
        $request = [
            'input' => [
                ['meters' => 5],
                ['yards' => 3]
            ],
            'output' => 'meters'
        ];

        $response = [
            'meta' => [
                'status' => 'success',
                'version' => '1.0'
            ],
            'data' => [
                'meters' => 7.74
            ]
        ];

        $this->json('POST', '/api/v1/distance/add', $request)
            ->seeJsonEquals($response);

        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Test yards + yards, output: meters
     */
    public function testYardsAdd(): void {
        $request = [
            'input' => [
                ['yards' => 5],
                ['yards' => 3]
            ],
            'output' => 'meters'
        ];

        $response = [
            'meta' => [
                'status' => 'success',
                'version' => '1.0'
            ],
            'data' => [
                'meters' => 7.32
            ]
        ];

        $this->json('POST', '/api/v1/distance/add', $request)
            ->seeJsonEquals($response);

        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Test meters + meters, output: yards
     */
    public function testMetersAdd(): void {
        $request = [
            'input' => [
                ['meters' => 5],
                ['meters' => 3]
            ],
            'output' => 'yards'
        ];

        $response = [
            'meta' => [
                'status' => 'success',
                'version' => '1.0'
            ],
            'data' => [
                'yards' => 8.75
            ]
        ];

        $this->json('POST', '/api/v1/distance/add', $request)
            ->seeJsonEquals($response);

        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Test meters + meters, output: meters
     */
    public function testOnlyMetersAdd(): void {
        $request = [
            'input' => [
                ['meters' => 5],
                ['meters' => 3]
            ],
            'output' => 'meters'
        ];

        $response = [
            'meta' => [
                'status' => 'success',
                'version' => '1.0'
            ],
            'data' => [
                'meters' => 8
            ]
        ];

        $this->json('POST', '/api/v1/distance/add', $request)
            ->seeJsonEquals($response);

        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Test yards + yards, output: yards
     */
    public function testOnlyYardsAdd(): void {
        $request = [
            'input' => [
                ['yards' => 5],
                ['yards' => 3]
            ],
            'output' => 'yards'
        ];

        $response = [
            'meta' => [
                'status' => 'success',
                'version' => '1.0'
            ],
            'data' => [
                'yards' => 8
            ]
        ];

        $this->json('POST', '/api/v1/distance/add', $request)
            ->seeJsonEquals($response);

        $this->assertEquals(200, $this->response->status());
    }

    /**
     * Test content type
     */
    public function testContentTypeAdd(): void {
        $this->post('/api/v1/distance/add', []);

        $this->assertEquals(406, $this->response->status());
    }
}
