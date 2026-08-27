<?php

namespace Sequenzy\EmailComponents\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailComponent;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListEmailComponentsResponse extends JsonSerializableType
{
    /**
     * @var ?array<EmailComponent> $components
     */
    #[JsonProperty('components'), ArrayType([EmailComponent::class])]
    public ?array $components;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   components?: ?array<EmailComponent>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->components = $values['components'] ?? null;
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
