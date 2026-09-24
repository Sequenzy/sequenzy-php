<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class AccountEvent extends JsonSerializableType
{
    /**
     * @var ?DateTime $eventTime
     */
    #[JsonProperty('eventTime'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $eventTime;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string, mixed> $properties
     */
    #[JsonProperty('properties'), ArrayType(['string' => 'mixed'])]
    public ?array $properties;

    /**
     * @var ?int $recipientCount
     */
    #[JsonProperty('recipientCount')]
    public ?int $recipientCount;

    /**
     * @param array{
     *   eventTime?: ?DateTime,
     *   id?: ?string,
     *   name?: ?string,
     *   properties?: ?array<string, mixed>,
     *   recipientCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventTime = $values['eventTime'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->properties = $values['properties'] ?? null;
        $this->recipientCount = $values['recipientCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
