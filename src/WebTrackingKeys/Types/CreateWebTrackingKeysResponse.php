<?php

namespace Sequenzy\WebTrackingKeys\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\WebTrackingKey;
use Sequenzy\Core\Json\JsonProperty;

class CreateWebTrackingKeysResponse extends JsonSerializableType
{
    /**
     * @var ?WebTrackingKey $key
     */
    #[JsonProperty('key')]
    public ?WebTrackingKey $key;

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
     *   key?: ?WebTrackingKey,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->key = $values['key'] ?? null;
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
