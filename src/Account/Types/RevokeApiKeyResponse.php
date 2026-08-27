<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ApiKeyMetadata;
use Sequenzy\Core\Json\JsonProperty;

class RevokeApiKeyResponse extends JsonSerializableType
{
    /**
     * @var ApiKeyMetadata $apiKey
     */
    #[JsonProperty('apiKey')]
    public ApiKeyMetadata $apiKey;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   apiKey: ApiKeyMetadata,
     *   message: string,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiKey = $values['apiKey'];
        $this->message = $values['message'];
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
