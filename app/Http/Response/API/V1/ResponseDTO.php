<?php
declare(strict_types=1);

namespace App\Http\Response\Api\V1;

/**
 * Represents API v1 response generic data
 *
 * Eg.
 * {
 *  "meta": {
 *      "status": "success",
 *      "version": "1.0"
 *  },
 *  "data": [...]
 * }
 *
 */
final class ResponseDTO implements \JsonSerializable {
    private const STATUS_SUCCESS = 'success';
    private const STATUS_FAILURE = 'failure';
    private const API_VERSION = '1.0';

    /**
     * @var array
     */
    private $meta;

    /**
     * @var array
     */
    private $data;


    /**
     * @param array  $data
     * @param bool   $isSuccess
     * @param string $errorMessage
     */
    public function __construct(array $data, bool $isSuccess, string $errorMessage = '') {
        if ($isSuccess) {
            $this->meta = [
                'status' => self::STATUS_SUCCESS,
                'version' => self::API_VERSION,
            ];
            $this->data = $data;
        } else {
            $this->meta['status'] = self::STATUS_FAILURE;
            $this->meta['msg'] = $errorMessage;
        }
    }


    /**
     * @inheritdoc
     */
    public function jsonSerialize() {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray(): array {
        $result = [
            'meta' => $this->meta,
        ];
        if (!empty($this->data)) {
            $result['data'] = $this->data;
        }

        return $result;
    }
}
