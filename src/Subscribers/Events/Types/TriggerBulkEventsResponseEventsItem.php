<?php

namespace Sequenzy\Subscribers\Events\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TriggerBulkEventsResponseEventsItem extends JsonSerializableType
{
    /**
     * @var ?bool $definitionCreated
     */
    #[JsonProperty('definitionCreated')]
    public ?bool $definitionCreated;

    /**
     * @var ?bool $duplicate Present and true when this event's eventId was already recorded for the contact and event name, so nothing was written and no side effects ran.
     */
    #[JsonProperty('duplicate')]
    public ?bool $duplicate;

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
     * @var ?array<string> $sideEffectFailures Present when this event was recorded but one or more side-effect stages (e.g. apply-sync-rules, trigger-event-automations) failed.
     */
    #[JsonProperty('sideEffectFailures'), ArrayType(['string'])]
    public ?array $sideEffectFailures;

    /**
     * @param array{
     *   definitionCreated?: ?bool,
     *   duplicate?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     *   sideEffectFailures?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->definitionCreated = $values['definitionCreated'] ?? null;
        $this->duplicate = $values['duplicate'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->sideEffectFailures = $values['sideEffectFailures'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
