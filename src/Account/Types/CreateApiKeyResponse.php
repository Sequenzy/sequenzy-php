<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CreateApiKeyResponse extends JsonSerializableType
{
    /**
     * @var ?CreateApiKeyResponseApiKey $apiKey
     */
    #[JsonProperty('apiKey')]
    public ?CreateApiKeyResponseApiKey $apiKey;

    /**
     * @var ?array<string, mixed> $instructions
     */
    #[JsonProperty('instructions'), ArrayType(['string' => 'mixed'])]
    public ?array $instructions;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   apiKey?: ?CreateApiKeyResponseApiKey,
     *   instructions?: ?array<string, mixed>,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiKey = $values['apiKey'] ?? null;
        $this->instructions = $values['instructions'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
