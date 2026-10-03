<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateInboxAddressResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $inbox Same shape as Get Inbox Address.
     */
    #[JsonProperty('inbox'), ArrayType(['string' => 'mixed'])]
    public ?array $inbox;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   inbox?: ?array<string, mixed>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inbox = $values['inbox'] ?? null;
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
