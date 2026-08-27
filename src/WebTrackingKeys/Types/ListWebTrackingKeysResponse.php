<?php

namespace Sequenzy\WebTrackingKeys\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\WebTrackingKey;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListWebTrackingKeysResponse extends JsonSerializableType
{
    /**
     * @var ?array<WebTrackingKey> $keys
     */
    #[JsonProperty('keys'), ArrayType([WebTrackingKey::class])]
    public ?array $keys;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   keys?: ?array<WebTrackingKey>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->keys = $values['keys'] ?? null;
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
