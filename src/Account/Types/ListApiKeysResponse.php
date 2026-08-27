<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ApiKeyMetadata;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListApiKeysResponse extends JsonSerializableType
{
    /**
     * @var array<ApiKeyMetadata> $apiKeys
     */
    #[JsonProperty('apiKeys'), ArrayType([ApiKeyMetadata::class])]
    public array $apiKeys;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   apiKeys: array<ApiKeyMetadata>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiKeys = $values['apiKeys'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
