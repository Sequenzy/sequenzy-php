<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TriggerEventsRequestAccountAttributes extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $attributes
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @var ?string $domain
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var string $externalId
     */
    #[JsonProperty('externalId')]
    public string $externalId;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<TriggerEventsRequestAccountAttributesRole> $role
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @param array{
     *   externalId: string,
     *   attributes?: ?array<string, mixed>,
     *   domain?: ?string,
     *   name?: ?string,
     *   role?: ?value-of<TriggerEventsRequestAccountAttributesRole>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributes = $values['attributes'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->externalId = $values['externalId'];
        $this->name = $values['name'] ?? null;
        $this->role = $values['role'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
